; Compteur des nombres pairs entre 0 et 100

global _start

_start:
init :
	mov rax, 0	; compteur nombres pairs
	mov rbx, 0	; compteur N

loop :
	cmp rbx, 100	; si on est rendu au bout, on quitte
	je exit

	mov rcx, rbx
	and rcx, 1

	inc rbx

	cmp rcx, 1
	je loop

	inc rax
	jmp loop

exit :
	mov rdi, rax
	mov rdi, 0
	syscall
