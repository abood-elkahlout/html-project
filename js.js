    function getrundomcolor(){
        var letters = '0123456789ABCDEF'.split('');
        var color="#";
        for(var i = 0 ; i< 6 ; i++){
            color += letters[Math.round(Math.random() * 15)];
        }
        return color;
    }


    // var arr=[];

    //     document.querySelector('.hello').onclick=function(){
    //        var val = document.querySelector('.in').value;
    //        arr.push(val);
    //        arr.splice(1,2)
    //        console.log(arr)
    //     };

    // document.querySelector('.hello').onclick=function(){
    //    var color = document.querySelector('.in').value;
    //     document.querySelector('.h1').style.color=color;
    // }

    var clickedtime; var createdtime; var reactiontime


    function time(){
        createdtime = Date.now();

        var time=Math.random();
        time=time*1000;

        setTimeout(function(){

            if (Math.random()> 0.5 ) {
                document.querySelector('.box').style.borderRadius="200px"
            }else{
             document.querySelector('.box').style.borderRadius="0px"
            }

            var top=Math.random();

            top=top*300;

            var left=Math.random();

             left = left*500;

            document.querySelector('.box').style.top=top+"px";
            
            document.querySelector('.box').style.left=left+"px";
        
            document.querySelector('.box').style.backgroundColor=getrundomcolor();
        
            document.querySelector('.box').style.display = 'block'
      
        },time) 
   }

    document.querySelector('.box').onclick = function(){
        clickedtime=Date.now();
        reactiontime=(clickedtime-createdtime)/1000;
        this.style.display = 'none';
        time();
        document.getElementById("h1").innerHTML=reactiontime;
    }

    time();