package main

import (
	"fmt"
	"os"
	"sort"
)

type tagCount struct {
	tag   string
	count int
}

func main() {
	args := os.Args[1:]

	counts := make(map[string]int)
	for _, tag := range args {
		counts[tag]++
	}

	var list []tagCount
	for tag, count := range counts {
		list = append(list, tagCount{tag: tag, count: count})
	}

	sort.Slice(list, func(i, j int) bool {
		return list[i].count > list[j].count
	})

	for _, item := range list {
		if item.count > 1 {
			fmt.Printf("%s: %d\n", item.tag, item.count)
		}
	}
}