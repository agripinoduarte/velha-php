window.onload = novo;
var tabuleiro, p1, p2, current;


function novo() {
	tabuleiro = new Tabuleiro('velha');
	if (game_id != null) {
		console.log('asdasda');
		if (current == requester_id) {
			tabuleiro.jogadorAtivo = true;
		} else if(current == subject_id) {
			tabuleiro.jogadorAtivo = false;
		}

		p1 = new Player(requester_id, 'x');
		p2 = new Player(subject_id, 'circle');
		current = p1;
		

		if (game.one != null) {
			marcar = game.one == 'x' ? tabuleiro.marcarX : (game.one == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(30, 30));
		}

		if (game.two != null) {
			marcar = game.two == 'x' ? tabuleiro.marcarX : (game.two == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(130, 30));
		}

		if (game.three != null) {
			marcar = game.three == 'x' ? tabuleiro.marcarX : (game.three == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(230, 30));
		}

		if (game.four != null) {
			marcar = game.four == 'x' ? tabuleiro.marcarX : (game.four == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(30, 130));
		}

		if (game.five != null) {
			marcar = game.five == 'x' ? tabuleiro.marcarX : (game.five == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(130, 130));
		}

		if (game.six != null) {
			marcar = game.six == 'x' ? tabuleiro.marcarX : (game.six == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(230, 130));
		}


		if (game.seven != null) {
			marcar = game.seven == 'x' ? tabuleiro.marcarX : (game.seven == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(30, 230));
		}


		if (game.eigth != null) {
			marcar = game.eigth == 'x' ? tabuleiro.marcarX : (game.eigth == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(130, 230));
		}

		if (game.nine != null) {
			marcar = game.nine == 'x' ? tabuleiro.marcarX : (game.nine == 'o' ? tabuleiro.marcarBola : null);

			if (marcar != null)
				marcar(tabuleiro.context, new Ponto(230, 230));
		}
	}
}

function clearBoard() {
	tabuleiro.limpaTabuleiro();

	if (game_id != null) {
		$.ajax({
			url: '/board/emptyBoard',
			type: 'POST',
			data: {game_id: game_id}
		}).done(function(data) {
			window.location.reload(true);
		});
	}
}

//classe Ponto
var Ponto = function(x, y) {
	this.setX = function(x) {
		this.x = x;
	};

	this.setY = function(y) {
		this.y = y;
	}

	this.setX(x);
	this.setY(y);
};

// classe Player
var Player = function(userid, shape) {
	this.userid = userid;
	this.shape = shape;
	this.squares = [];

	this.checkWin = function () {
		win = (this.squares[0] + this.squares[1] + this.squares[2]) % 6 == 0 ||
			(this.squares[0] + this.squares[1] + this.squares[2]) % 12 == 0 ||
			(this.squares[0] + this.squares[1] + this.squares[2]) % 15 == 0 ||
			(this.squares[0] + this.squares[1] + this.squares[2]) % 18 == 0 ||
			(this.squares[0] + this.squares[1] + this.squares[2]) % 24 == 0;

		return win;
	};
};



//classe Tabuleiro
var Tabuleiro = function(canvasId) {
	this.posicoes = [null, null, null, null, null, null, null, null, null];

	this.setCanvas = function(canvas) {
		this.canvas = canvas;
	};

	this.setContext = function(context) {
		this.context = context;
	};

	this.setPosicoes = function(posicoes) {
		for (var i = this.posicoes.length - 1; i >= 0; i--) {
			this.posicoes[i] = null;
		};
	};

	this.setJogadorAtivo = function(jogadorAtivo) {
		this.jogadorAtivo = jogadorAtivo;
	},

	this.desenhar = function() {
		this.context.fillRect(100,10,5,300);
		this.context.fillRect(200,10,5,300);
		this.context.fillRect(10,100,300,5);
		this.context.fillRect(10,200,300,5);
	};

	this.venceu = function() {
		if (this.igual([1,2,3])) {
			return true;

		} else if (this.igual([4,5,6])) {
			return true;
		} else if (this.igual([7,8,9])) {
			return true;
		} else if (this.igual([1,4,7])) {
			return true;
		} else if (this.igual([2,5,8])) {
			return true;
		} else if (this.igual([3,6,9])) {
			return true;
		} else if (this.igual([1,5,9])) {
			return true;
		} else if (this.igual([3,5,7])) {
			return true;
		} else {
			return false;
		}
	};

	this.igual = function(array) {
		var retorno = true;
		for (i = 0; i < array.length; i++) {
			if (this.posicoes[array[i]] != this.jogadorAtivo) {
				retorno = false;
				break;
			}
		}
		return retorno;
	};

	this.posicaoCursor = function(e) {
		var x;
		var y;
		if (e.pageX || e.pageY) {
		  x = e.pageX;
		  y = e.pageY;
		} else {
		  x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		  y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
		}
		x -= this.canvas.offsetLeft;
		y -= this.canvas.offsetTop;
		return new Ponto(x,y);
	};

	/*
	1 de (0,0)  	at� (99,99)		; 2 de (106,0) 	at� (199,99)	; 3 de (206,0)    	at� (299,99)
	4 de (0,106) at� (99,199)	; 5 de (106,199) 	at� (199,199)	; 6 de (206,199)	at� (299,199)
	7 de (0,206) at� (99,299)	; 8 de (106,206)  	at� (199,299)	; 9 de (206,206)	at� (299,299)	
	*/
	this.obterQuadradoSelecionado = function(ponto) {
		if (ponto.x >= 0 && ponto.x <=99) { //1, 4 ou 7
			if (ponto.y >=0 && ponto.y <= 99) {
				return 1;
			} else if (ponto.y >= 106 && ponto.y <= 199) {
				return 4;
			} else if (ponto.y >= 206 && ponto.y <= 299) {
				return 7;
			} 
		} else if (ponto.x >=106 && ponto.x <=199) { //2, 5 ou 8
			if (ponto.y >=0 && ponto.y <= 99) {
				return 2;
			} else if (ponto.y >= 106 && ponto.y <= 199) {
				return 5;
			} else if (ponto.y >= 206 && ponto.y <= 299) {
				return 8;
			} 
		} else if (ponto.x >=206 && ponto.x <=299) { //3, 6 ou 9
			if (ponto.y >=0 && ponto.y <= 99) {
				return 3;
			} else if (ponto.y >= 106 && ponto.y <= 199) {
				return 6;
			} else if (ponto.y >= 206 && ponto.y <= 299) {
				return 9;
			} 
		} else {
			return null;
		}
	};

	this.marcarBola = function(context, ponto) {
		context.beginPath();
		context.fillStyle = "#00B060";
		context.arc(ponto.x+20, ponto.y+20, 35, 0,Math.PI*2,true); // Outer circle
		context.moveTo(0,0);
		context.stroke();
		context.fill();
	};

	this.marcarX = function(context, ponto) {
		context.beginPath();

		context.moveTo(ponto.x - 10, ponto.y - 20);
		context.lineTo(ponto.x + 45, ponto.y + 55);
		context.moveTo(ponto.x + 45, ponto.y - 20);
		context.lineTo(ponto.x - 10, ponto.y + 55);
		context.stroke();
	};

	this.limpaTabuleiro = function() {
		this.setPosicoes(null);
		this.context.fillStyle = "#FFFFFF";
		this.context.fillRect(10,10,90,90);
		this.context.fill();
		this.context.fillRect(105,10,95,90);
		this.context.fill();
		this.context.fillRect(205,10,95,90);
		this.context.fill();
		
		this.context.fillRect(10,105,90,95);
		this.context.fill();
		this.context.fillRect(105,105,95,95);
		this.context.fill();
		this.context.fillRect(205,105,95,95);
		this.context.fill();

		this.context.fillRect(10,205,90,95);
		this.context.fill();
		this.context.fillRect(105,205,95,95);
		this.context.fill();
		this.context.fillRect(205,205,95,95);
		this.context.fill();
	};

	this.marcarJogada = function(number){
		this.posicoes[number] = this.jogadorAtivo;

		var marcar = this.jogadorAtivo ? this.marcarX : this.marcarBola;
		shape = this.jogadorAtivo ? 'x' : 'o';


		if (number == 1) {
			marcar(this.context, ponto = new Ponto(30, 30));
		} else if (number == 2) {
			marcar(this.context, ponto = new Ponto(130, 30));
		} else if (number == 3) {
			marcar(this.context, ponto = new Ponto(230, 30));
		} else if (number == 4) {
			marcar(this.context, ponto = new Ponto(30, 130));
		} else if (number == 5) {
			marcar(this.context, ponto = new Ponto(130, 130));
		} else if (number == 6) {
			marcar(this.context, ponto = new Ponto(230, 130));
		} else if (number == 7) {
			marcar(this.context, ponto = new Ponto(30, 230));
		} else if (number == 8) {
			marcar(this.context, ponto = new Ponto(130, 230));
		} else if (number == 9) {
			marcar(this.context, ponto = new Ponto(230, 230));
		}

		if (game_id != null) {
			$.ajax({
		        url: '/board/move',
		        type: 'POST',
		        data: {player: shape, square: number, game_id: game_id, player_id: me}
		    }).done(function(data) {
		    	window.location.reload(true);
		    });
		    current = current.shape == 'x' ? p2 : p1;
		}
		
	};

	var e;
	var canvas = document.getElementById(canvasId);
	this.setCanvas(canvas);
	this.canvas.width = 300;
	this.canvas.height= 300;
	this.setContext(canvas.getContext('2d'));
	this.setPosicoes(new Array(10));
	this.setJogadorAtivo(true);
	this.desenhar();
	
	canvas.onclick = function(e) {
		return main(tabuleiro, e);
	};
}

//metodo com a regra do jogo
function main(tabuleiro, event) {
	var quadrado = tabuleiro.obterQuadradoSelecionado(tabuleiro.posicaoCursor(event));
	if (tabuleiro.posicoes[quadrado] == null) {
		tabuleiro.marcarJogada(quadrado);	

		if (tabuleiro.venceu(tabuleiro.jogadorAtivo)) {
			alert('Jogador ' + (tabuleiro.jogadorAtivo ? 'xis vermelho' : 'bola verde') + ' venceu!');
			tabuleiro.setPosicoes(null);
		} else {
			tabuleiro.setJogadorAtivo(!tabuleiro.jogadorAtivo);
		}	

	}
}