#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(void) {
    srand(time(NULL));
    unsigned short random = rand() % 101, input;

    while (1) {
        do {
            //printf("\nPlease, enter a number between [0 ; 100]:\n");
            scanf("\nPlease, enter a number between [0 ; 100]:\n%d", &input);
        } while (input < 0);

        if (input == random) return EXIT_SUCCESS;
        else if (input > random) printf("It's less.\n");
        else printf("It's more.\n");
    }
}
