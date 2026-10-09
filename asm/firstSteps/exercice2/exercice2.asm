; Exercice 2 : Suite de Fibonacci
; Réaliser 10 itrérations de la suite de Fibonacci

global _start

_start:
init :
	mov rax, 0
	mov rbx, 1
	mov rcx, 0	; compteur boucle

main :
	mov rdx, rcx	; variable temporaire
	cmp rdx, 9	; condition d'arrêt (boucle)
	je exit

	inc rcx		; incrémente la boucle

	mov rdx, rax
	add rdx, rbx	; temp = a+b

	mov rax, rbx	; a = b
	mov rbx, rdx	; b = temp

	jmp main

exit :
	mov rdi, rax
	mov rdi, 0
	syscall

