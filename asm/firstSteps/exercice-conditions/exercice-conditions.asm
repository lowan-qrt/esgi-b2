; Exercice sur les conditions
; Pratiquer et maîtriser les conditions

global _start

_start:
init :
	mov rax, 0 ; variable mutable
	mov rbx, 0 ; compteur de boucle

boucle :
	cmp rbx, 100
	je exit		; si compteur = 100, fin de la boucle

	cmp rbx, 20
	jl premiere_condition

	cmp rbx, 70
	jg deuxieme_condition

	mov rcx, rbx
	and rcx, 1
	jz troisieme_condition

	jmp else

	premiere_condition : ; (i < 20 => a += 10)
	add rax, 10
	jmp next_iteration

	deuxieme_condition :
	add rax, 5
	jmp next_iteration

	troisieme_condition :
	inc rax
	jmp next_iteration

	else :
	dec rax
	jmp next_iteration

	next_iteration :
	inc rbx ; prochaine itéaration
	jmp boucle

exit :
	mov rdi, rax
	mov rax, 60
	syscall
