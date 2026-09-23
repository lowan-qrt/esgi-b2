#include <stdio.h>
#include <stdlib.h>

void decrementer(int *p) {
    // exercice 17
    --*p;
}

void multiplier(int *n, int p) {
    // exercice 18
    *n *= p;
}

short main(void) {
    int a = 10;
    printf("%d", a);
    decrementer(&a);
    printf("\n%d", a);

    a = 10;
    printf("\n\n%d", a);
    multiplier(&a, 2);
    printf("\n%d", a);

    return EXIT_SUCCESS;
}