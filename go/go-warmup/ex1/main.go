package main

import (
	"os"
	"fmt"
)

func main() {
	const MaxDisplay = 10

	mots := os.Args[1:]

	if (len(mots) == 0) {
		fmt.Fprintln(os.Stderr, "Erreur : aucun argument fourni")
		return
	}

	fmt.Printf("Nombre total de mots : %d\n", len(mots))

	for i := 0; i < len(mots); i++ {
		if len(mots[i]) > 4 {
			fmt.Println(mots[i])
		}
	}
}
