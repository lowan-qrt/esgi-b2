; Exercice 4 : Division euclidienne
; Si rax = 10 et rbx = 3, le résultat de ce cette fonction devra être rax = 3 et rbx = 1 car 10 / 3 est égal à 3 reste 1.

global _start

_start:
init :
	mov rax, 10
	mov rbx, 3
	mov rcx, 0	; variable d'incrément
	mov rdx, 0	; variable temporaire

while :
	sub rax, rbx


exit :
	mov rdi, rax
	mov rdi, 0
	syscall
