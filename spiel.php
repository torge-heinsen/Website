<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Spiel</title>
  </head>

  <body>
    <canvas id="canvas" width="720" height="480"></canvas>

        <script>
            let canvas = document.getElementById('canvas');
            let context = canvas.getContext('2d');
            let rows = 16;
            let clms = 24;
            let snake=[
            {x:17,y:5}
            ];
            let food;
            let foodCollected = false;
            let cellwidth = canvas.width/clms;
            let cellhight = canvas.height/rows;
            let direction = 'LEFT';


            placeFood();

            setInterval(gameloop, 500);
            document.addEventListener('keydown',keydown);

            draw();

            function draw(){
              context.fillStyle = 'black';
              context.fillRect(0, 0, canvas.width, canvas.height);
              context.fillStyle = 'white';

              snake.forEach(part => add(part.x,part.y));

              context.fillStyle='green';
              add(food.x,food.y); //essen

              requestAnimationFrame(draw);
            }
            function gameover(){
              if(snake[0].x < 0 ||
                snake[0].x > clms -1 ||
                snake[0].y < 0 ||
                snake[0].y > rows -1)
                {
                  placeFood();
                  snake=[
                  {x:17,y:5}];
                  direction ='LEFT';
                }
            }


            function placeFood() {
	            let randomX = Math.floor(Math.random()*clms);
	            let randomY = Math.floor(Math.random()*rows);

               food = {x: randomX, y:randomY};
            }

            function add(x,y){
                context.fillRect(x*cellwidth,y*cellhight,cellwidth,cellhight);
            }

            function moveSnake() {
              for (let i = snake.length - 1; i > 0; i--){
                const part = snake[i];
                const lastpart = snake[i - 1];
                part.x = lastpart.x;
                part.y = lastpart.y;
              }
            }


            function gameloop() {
              gameover();
              if(foodCollected){
                  snake = [
                    {x:snake[0].x,
                    y:snake[0].y}
                    , ...snake]
                foodCollected = false;
              }

              moveSnake();
              if (direction == 'LEFT')
                  {snake[0].x--;}
              if (direction == 'RIGHT')
                  {snake[0].x++;}
              if (direction == 'UP')
                  {snake[0].y--;}
              if (direction == 'DOWN')
                  {snake[0].y++;}

              if (snake[0].x == food.x &&
                    snake[0].y == food.y){
                    foodCollected = true;
                    placeFood();
              }
            }


            function keydown(e) {
              if (e.keyCode == 37)
                {direction ='LEFT';}
              if (e.keyCode == 38)
              	{direction ='UP';}
              if (e.keyCode == 39)
              	{direction ='RIGHT';}
              if (e.keyCode == 40)
              	{direction ='DOWN';}
              }



        </script>












  </body>
</html>
