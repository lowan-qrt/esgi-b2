package main

import (
	"errors"
	"fmt"
	"sync"
)

type Note struct {
	ID      string
	Title   string
	Content string
	Tags    []string
}

var (
	ErrDuplicate  = errors.New("note already exists")
	ErrNotFound   = errors.New("note not found")
	ErrValidation = errors.New("invalid note")
)

type NoteStore interface {
	Save(n *Note) error
	Get(id string) (*Note, error)
	All() []*Note
}

type MemoryStore struct {
	mu    sync.Mutex
	notes map[string]*Note
}

var _ NoteStore = (*MemoryStore)(nil)

func NewMemoryStore() *MemoryStore {
	return &MemoryStore{notes: make(map[string]*Note)}
}

func (s *MemoryStore) Save(n *Note) error {
	if n.Title == "" {
		return fmt.Errorf("note %q : titre vide : %w", n.ID, ErrValidation)
	}
	s.mu.Lock()
	defer s.mu.Unlock()
	if _, ok := s.notes[n.ID]; ok {
		return fmt.Errorf("note %q : %w", n.ID, ErrDuplicate)
	}
	s.notes[n.ID] = n
	return nil
}

func (s *MemoryStore) Get(id string) (*Note, error) {
	s.mu.Lock()
	defer s.mu.Unlock()
	n, ok := s.notes[id]
	if !ok {
		return nil, fmt.Errorf("note %q : %w", id, ErrNotFound)
	}
	return n, nil
}

func (s *MemoryStore) All() []*Note {
	s.mu.Lock()
	defer s.mu.Unlock()
	all := make([]*Note, 0, len(s.notes))
	for _, n := range s.notes {
		all = append(all, n)
	}
	return all
}

func main() {
	store := NewMemoryStore()

	// casss normal
	err := store.Save(&Note{ID: "1", Title: "Cours Go", Content: "Les interfaces"})
	fmt.Println("save 1 :", err)

	// doublon d'ID
	err = store.Save(&Note{ID: "1", Title: "Autre", Content: "..."})
	fmt.Println("save 1 bis :", err)
	fmt.Println("  est un doublon ?", errors.Is(err, ErrDuplicate))

	// title vide
	err = store.Save(&Note{ID: "2", Title: "", Content: "..."})
	fmt.Println("save 2 :", err)
	fmt.Println("  est une validation ?", errors.Is(err, ErrValidation))

	// ID présent  ou absent
	n, err := store.Get("1")
	fmt.Println("get 1 :", n.Title, err)

	_, err = store.Get("42")
	fmt.Println("get 42 :", err)
	fmt.Println("  est introuvable ?", errors.Is(err, ErrNotFound))

	fmt.Println("nombre de notes :", len(store.All()))
}
