for N in 1:5:20
    println("The N of this iteration in $N")
end

Threads.@threads for i in 1:10
    println(Threads.threadid())
end

Threads.@threads for N in 1:5:20
    println("The number of this iteration is $N")
end

using Distributed
@distributed for N in 1:5:20
    println("The N of this iteration in $N")
end

Threads.@threads for i = 1:12
	println(i, " on thread ", Threads.threadid())
end

@sync for i = 1:12
Threads.@spawn println(i, " on thread ", Threads.threadid())
end

function withthreads()
    arr = zeros(Int, 10)
    Threads.@threads for i in 1:10
       sleep(3 * rand())
       arr[i] = i
    end
    println("with @threads: $arr")
end


function withspawn()
    arr = zeros(Int, 10)
    for i in 1:10
        Threads.@spawn begin
            sleep(3 * rand())
            arr[i] = i
        end
    end
    println("with @spawn: $arr")
end

function withsync()
    arr = zeros(Int, 10)
    @sync begin
        for i in 1:10
           Threads.@spawn begin
               sleep(3 * rand())
               arr[i] = i
           end
        end
    end
    println("with @sync: $arr")
end

withthreads()
withspawn()
withsync()

a1 = map(string, 1:9, 'a':'i')

using Folds
a2 = Folds.map(string, 1:9, 'a':'i')
@assert a1 == a2

using Distributed
a3 = pmap(string, 1:9, 'a':'i')
@assert a1 == a3

import Base.Threads.@spawn
using BenchmarkTools

function fib(n::Int)
    if n < 2
        return n
    end
    t = fib(n - 2)
    return fib(n - 1) + t
end

function fib_threads(n::Int)
    if n < 2
        return n
    end
    t = @spawn fib_threads(n - 2)
    return fib(n - 1) + fetch(t)
end

println(fib(20))
println(fib_threads(20))


