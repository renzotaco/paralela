#include <omp.h>
#include <stdio.h>
#include <stdlib.h>
int main(int argc, char *argv[])
{
	printf("ID: %d, Max threads: %d, Num threads: %d \n", omp_get_thread_num(), omp_get_max_threads(), omp_get_num_threads());
	omp_set_num_threads(5);
	printf("ID: %d, Max threads: %d, Num threads: %d \n", omp_get_thread_num(), omp_get_max_threads(), omp_get_num_threads());

#pragma omp parallel num_threads(5)
	{
		// omp_set_num_threads(6);	// Do not call it in parallel region
		printf("ID: %d, Max threads: %d, Num threads: %d \n", omp_get_thread_num(), omp_get_max_threads(), omp_get_num_threads());
	}

	printf("ID: %d, Max threads: %d, Num threads: %d \n", omp_get_thread_num(), omp_get_max_threads(), omp_get_num_threads());

	omp_set_num_threads(6);
	printf("ID: %d, Max threads: %d, Num threads: %d \n", omp_get_thread_num(), omp_get_max_threads(), omp_get_num_threads());

	return 0;
}