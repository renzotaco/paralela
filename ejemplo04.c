#include <stdlib.h>
#include <stdio.h>
#include "omp.h"

void test()
{
    for (int i = 0; i < 80000; i++)
    {
        //do something
    }
}

int main(int argc, char **argv)

{

    float startTime = omp_get_wtime();
    // Especifique 2 hilos
#pragma omp parallel for num_threads(2)
    for (int i = 0; i < 80000; i++)
    {
        test();
    }
    float endTime = omp_get_wtime();
    printf("Especifique 2 subprocesos, tiempo de ejecución:% f \ n", endTime - startTime);
    startTime = endTime;
    // Especifique 4 hilos
#pragma omp parallel for num_threads(4)
    for (int i = 0; i < 80000; i++)
    {
        test();
    }
    endTime = omp_get_wtime();
    printf("Especifique 4 subprocesos, tiempo de ejecución:% f \ n", endTime - startTime);
    startTime = endTime;
    // Especifique 8 hilos
#pragma omp parallel for num_threads(8)
    for (int i = 0; i < 80000; i++)
    {
        test();
    }
    endTime = omp_get_wtime();
    printf("Especifique 8 subprocesos, tiempo de ejecución:% f \ n", endTime - startTime);
    startTime = endTime;
    // Especifique 12 hilos

#pragma omp parallel for num_threads(12)
    for (int i = 0; i < 80000; i++)
    {
        test();
    }
    endTime = omp_get_wtime();
    printf("Especifique 12 subprocesos, tiempo de ejecución:% f \ n", endTime - startTime);
    startTime = endTime;
    // No use OpenMP
    for (int i = 0; i < 80000; i++)
    {
        test();
    }
    endTime = omp_get_wtime();
    printf("No utilice subprocesos múltiples de OpenMP, tiempo de ejecución:% f \ n", endTime - startTime);
    startTime = endTime;
    return 0;
}