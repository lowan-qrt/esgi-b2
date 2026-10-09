#!/bin/bash
set -e

find . -name "*.asm" | while read f; do
  nasm -f elf64 -F dwarf -g "$f" -o code.o
  ld code.o -o code

  gdb -ex "layout src" -ex "break _start" -ex "run" code < /dev/tty
done
