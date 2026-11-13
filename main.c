#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void)
{
    /*
     * Exercice 1 : Saisie sécurisée
     * Demandez un âge avec fgets et sscanf, refusez les saisies invalides.
     */
    /*
    char ligne[5];
    int age;

    printf("Entrez votre âge : ");

    if (fgets(ligne, sizeof(ligne), stdin) != NULL) {
        if (sscanf(ligne, "%d", &age) == 1) {
            if (age >= 100 || age <= 0) {
                printf("L'âge est trop grand ou trop petit.\n");
            } else
            {
                printf("Vous avez %d ans.\n", age);
            }
        } else {
            printf("L'âge n'est pas correct.\n");
        }
    }*/

    /*
     * Exercice 2 : Découpage
     * Découper "pomme,orange,banane,fraise" avec strtok et afficher chaque fruit.
     */
    /*
    char fruits[] = "pomme,orange,banane,fraise";
    char *mot = strtok(fruits, ",");
    while (mot != NULL) {
        printf("%s ", mot);
        mot = strtok(NULL, ",");
    }*/

    /*
     * Exercice 3 : Analyse
     * Extrayez le prénom, l'âge et la ville de "Linus 55 Nantes" avec sscanf
     */
    char firstname[10];
    int age;
    char city[10];

    char ligne[] = "Linus 55 Nantes";
    printf("Nombre de mots trouvés : %d\n", sscanf(ligne, "%s%d%s", &firstname, &age, &city));
    printf("%s %d %s", firstname, age, city);

    return EXIT_SUCCESS;
}