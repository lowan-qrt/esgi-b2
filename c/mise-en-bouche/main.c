#include <stdio.h>
#include <stdlib.h>
#include <time.h>

short main(void) {
    srand(time(NULL));
    unsigned short random = rand() % 101, input;

    while (1) {
        do {
            printf("\nPlease, enter a number between [0 ; 100]:");
            scanf("%hu", &input);
            printf("\t-- Number selected: %hu\n\n", input);
        } while (input > 100);

        if (input == random) return EXIT_SUCCESS;
        else if (input > random) printf("It's less.\n");
        else printf("It's more.\n");
    }
}
