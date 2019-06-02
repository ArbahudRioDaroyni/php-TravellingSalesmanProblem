<html>
    <head>
        <title>Algoritma Penyelesaian Kasus TSP dengan RBFS</title>
        <script type="text/javascript" src="jquery.js"></script>
        <style>
        .page{
            margin: 10px auto;
            width: 700px;
            padding: 10px;
            text-align: center;
            border: 1px solid #999;
            border-radius: 5px;
        }

        .content h3{
            text-align: left;
            margin
        }

        .spinner{
            padding: 0 7px;
            background: url("spin.gif") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        }

        .soal{
            width: 100%;
            border-radius: 3px;
        }

        .frame{
            padding: 10px;
            --border: 1px solid #aaa;
            --border-radius: 3px;
            border-bottom: 1px dashed #999;
            margin-bottom: 10px;
        }

        .result{
            margin-top: 10px;
            background-color: #eaeaea;
            border-radius: 3px;
            border: 1px solid #aaa;
            padding: 10px;
            text-align: left;
            font-size: 0.85em;
        }

        .reset{
            float: right;
        }

        .tabung{
            font-family: "Courier New";
        }

        .left{
            width: 60%;
            float: left;
            text-align: left;
            padding: 10px;
        }

        .right{
            width: 30%;
            float: right;
            padding: 10px;
        }

        .right select{
            padding: 5px;
        }

        .right .cari{
            padding: 2px;
            background-color: yellow;
            border: 1px solid red;
            border-radius:3px;
            box-shadow: 1px 1px 1px 0px #aaa;
            cursor: pointer;
        }

        .hasilx{
            margin-top: 10px;
        }

        .cost-yellow{
            color: red;
            font-weight: bold;
        }

        .cost-red{
            font-weight: bold;
            color: green;
        }
        </style>
    </head>
    <body>
        <div class="page">
            <h1>Kecerdasan Buatan Metode best first search</h1>
            <span style="color:#000; font-weight:normal;">Arbahud Rio Daoyni 1461505151</span>
        </div>
        <div class="page content">
<!--            <div class="frame"><img class="soal" src="soal-rbfs.jpg"/></div> -->
            <div class="form">
                <div class="right">Asal :

                    <button class="cari">Cari</button>
                </div>
                <div class="left">
                    <span class="hasil">Hasil Pencarian Jalur Terbaik :</span><br/>
                    <span class="hasilx"></span>
                </div>
            </div>

            <div style="clear:both"></div>
            <div class="result">
                <button class="reset">Reset</button>
                <div style="clear:both;"></div>
                <div class="tabung"></div>
            </div>
            <span align="right"></span>
        </div>

        <script>
            $('.reset').click(function(){
                $('.tabung').html('');
            });

            $('.cari').click(function(){

                var hsl  = $('.tabung');
                hsl.html('');

                var hslx = $('.hasilx');
                hslx.html('');
                hslx.addClass('spinner');

                var url  = 'start.php';
                var data = {'id': $('.kota').val()};
                var post = $.post(url,data);
                post.done(function(response){
					data = response;
					if(data['status']=='OK'){
						hsl.html('<h4>'+ data['data'].length +' Steps</h4>');

                        nn = 0;
                        li = '';
                        (data['data']).forEach(function(item){
                            nice = 'yellow'
                            if(nn >= data['data'].length-2) nice = 'red';
                            li += '<li style="list-style-type: decimal-leading-zero;">'+item.path + ' (<span class="cost-'+ nice +'">'+ item.cost +'</span>km)</li>';
                            if(nn == data['data'].length-1){
                                hslx.removeClass('spinner');
                                hslx.html('<span class="cost-'+ nice +'">'+item.path + ' ('+ item.cost +' km)</span> <br/>atau sebaliknya.');
                            }
                            nn++;
                        });
                        hsl.append('<ul>'+ li +'</ul>');
					}
					// hsl.html(data['data'].length);
                });
            });
        </script>
    </body>
</html>
