package main

import (
	"bufio"
	"fmt"
	"os"
	"strings"
)

type Note struct {
	Title   string
	Content string
	Tags    []string
}

func (n *Note) Preview() string {
	if len(n.Content) <= 80 {
		return n.Content
	}
	return n.Content[:80]
}

func (n *Note) AddTag(tag string) {
	for _, t := range n.Tags {
		if t == tag {
			return
		}
	}
	n.Tags = append(n.Tags, tag)
}

func (n *Note) HasTag(tag string) bool {
	for _, t := range n.Tags {
		if t == tag {
			return true
		}
	}
	return false
}

func NewNote(title, content string) *Note {
	return &Note{
		Title:   title,
		Content: content,
		Tags:    []string{},
	}
}

func LoadFromFile(path string) ([]*Note, error) {
	f, err := os.Open(path)
	if err != nil {
		return nil, err
	}
	defer f.Close()

	var notes []*Note
	scanner := bufio.NewScanner(f)
	for scanner.Scan() {
		parts := strings.Split(scanner.Text(), "|")
		if len(parts) < 2 {
			continue
		}
		note := NewNote(parts[0], parts[1])
		if len(parts) == 3 {
			for _, tag := range strings.Split(parts[2], ",") {
				note.AddTag(tag)
			}
		}
		notes = append(notes, note)
	}
	return notes, scanner.Err()
}

func main() {
	n := NewNote("Ma note bidon", "Cette note sert à rien mais elle existe.")
	// J'affiche le titre et le contenu
	fmt.Println(n.Title)
	// fmt.Println(n.Content)

	// J'affiche seulement les 80 première lignes
	fmt.Println(n.Preview())

	// J'affiche les tags
	n.AddTag("go")
	n.AddTag("go")
	n.AddTag("cours")
	fmt.Println(n.Tags)

	// Je charge les notes depuis le fichier
	notes, err := LoadFromFile("notes.txt")
	if err != nil {
		fmt.Println("erreur :", err)
		return
	}

	// J'affiche seulement les notes qui ont le tag "go"
	for _, note := range notes {
		if note.HasTag("go") {
			fmt.Println(note.Title, note.Tags)
		}
	}
}
