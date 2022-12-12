<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            border: 1px dotted grey;
            padding: 20px;
            display: grid;
            grid-template-rows: repeat(2, 1fr);
            grid-template-areas:
                    "f f f u u"
                    "c c c c c";
            align-items: center;
            justify-items: center;
        }
        .forecast {
            grid-area: f;
            width: 200px;
        }
        .update {
            grid-area: u;
            cursor: pointer;
        }
        .currency {
            grid-area: c;
            display: flex;
            gap: 10px;
        }

        .forecast, .incur, .update {
            border: 1px solid beige;
            padding: 5px;
            text-align: center;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<h2>HopHey</h2>
<div class="container">
    <div class="forecast"></div>
    <div class="update">update</div>
    <div class="currency">
        <?php foreach (getCurrency() as $country): ?>
            <?php extract(get_object_vars($country)); ?>
            <div class="incur">
                <p><?= "{$Nominal} {$CharCode} = {$Value} RUB"; ?></p>
                <p><?= $Name; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        const upd = document.querySelector('.update');
        upd.addEventListener('click', () => {
            const api = "a389ab1ccc4d4f03948212326221112";
            const city = "Moscow";
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `https://api.weatherapi.com/v1/current.json?key=${api}&q=${city}&aqi=yes`, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Content-type','application/json');
            xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    renderFc(xhr.response);
                }
            }
            xhr.send();

        });

        function renderFc(data){
            const fc = document.querySelector('.forecast');
            const { location, current } = JSON.parse(data);
            fc.innerHTML = `
                <p>${location.name}</p>
                <p>Температура ${current.temp_c} &deg;</p>
                <p>Ощущается как ${current.feelslike_c} &deg;</p>
                <p>${current.condition.text} <img src="${current.condition.icon}" alt="icon"></p>
            `;
        }
    </script>
</div>
</body>
</html>