; Exercice 3 : factorielle
; À partir d'un nombre stocké dans un registre, calculer la factorielle de ce nombre. Vous n'avez le droit d'utiliser uniquement l'addition pour calculer le résultat.

global _start

_start:
init :
	mov rax, 4	; factorielle à calculer
	mov rbx, rax	; indice (rax - 1)
	dec rbx

factorielle :
	mov rcx, rbx	; variable temporaire
	cmp rcx, 1	; condition d'arrêt
	je exit

rax

boucleMultiplicative :


exit :
	mov rdi, rax
	mov rdi, 0
	syscall
