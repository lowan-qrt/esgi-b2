#include <stdio.h>
#include <stdlib.h>

#define SIZE 8

void reverseArray(int *array, int size) {
    for (int i = 0; i < size / 2; ++i) {
        int temp = array[i];
        array[i] = array[size - 1 - i];
        array[size - 1 - i] = temp;
    }
}

int main(void) {
    int array[SIZE];

    for (int i = 0; i < SIZE; ++i) {
        printf("Please, enter number %d/8: ", i + 1);
        scanf("%d", &array[i]);
    }

    reverseArray(array, SIZE);

    printf("\nReversed array: ");
    for (int i = 0; i < SIZE; ++i) {
        printf("%d ", array[i]);
    }
    printf("\n");

    return EXIT_SUCCESS;
}