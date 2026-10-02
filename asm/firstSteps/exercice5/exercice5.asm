; Exercice 5
; Trouver la valeur maximale de la Stack (pile) parmis N éléments

global _start

_start:
init :
	; ajout de N valeurs dans la stack
	push 2
	push 5
	push 22
	push 4
	push 10

	mov rax, 5 ; nombre d'éléments N dans la stack
	mov rcx, rax ; compteur (représente N)

	pop rbx ; on initialise avec la dernière valeur ajoutée de la stack
	dec rcx ; du coup il reste N-1 nombres dans la stack

boucle_recherche_max :
	cmp rcx, 0 ; si compteur = N ou compteur = 0, fin de la boucle -> exit
	jz exit

	pop r8; on prend une nouvelle valeur de la stack
	dec rcx

	cmp r8, rbx ; si la valeur est plus grande, on la prend
	jg changement_val_max

	jle boucle_recherche_max

changement_val_max :
	mov rbx, r8
	jmp boucle_recherche_max


exit :
	mov rax, rbx
	mov rdi, 0
	mov rax, 60
	syscall
