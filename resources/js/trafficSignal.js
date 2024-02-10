
/**
 * 
 * Функциия переключает цвета
 * 
 */
function trafficSignal() {
    var green = $("#green");
    var red = $("#red");
    var yellow = $("#yellow");

    green.addClass("select")
    green.addClass("old_select")

    green.css("opacity", "1");
    setTimeout(function() {
        green.css("opacity", ".3");
        red.css("opacity", ".3");
        yellow.css("opacity", "1");
        green.removeClass("select")
        yellow.addClass("select")
    }, 5000);

    setTimeout(function() {
        green.css("opacity", ".3");
        red.css("opacity", "1");
        yellow.css("opacity", ".3");
        red.addClass("select")
        red.addClass("old_select")
        green.removeClass("old_select")
        yellow.removeClass("select")
    }, 7000);

    setTimeout(function() {
        green.css("opacity", ".3");
        red.css("opacity", ".3");
        yellow.css("opacity", "1");
        red.removeClass("select")
        yellow.addClass("select")
    }, 12000);

    setTimeout(function() {
        green.css("opacity", "1");
        red.css("opacity", ".3");
        yellow.css("opacity", ".3");
        green.addClass("select")
        green.addClass("old_select")
        red.removeClass("old_select")
        yellow.removeClass("select")
    }, 14000);
}

/**Функция запускает и зацикливает переключаение светофора */
export function startTrafficSignal(){
    var timer = setInterval(function() {
        trafficSignal();
    }, 14000);
}

/**Функция определяет какое сообщение должно выводится, выводит его и отправляет запрос на сохранение в БД */
export function runTraficSignal() {
    if($(".select").length > 0){
        let selected = $(".select")[0].id
        let log = null
        switch (selected) {
            case 'green':
                log = 'Проезд на зеленый!'
                break
            case 'yellow':
                switch ($(".old_select")[0].id) {
                    case 'green':
                        log = 'Успели на желтый!'
                        break
                    case 'red':
                        log = 'Слишком рано начали движение!'
                        break
                }
                break
            case 'red':
                log = 'Проезд на красный. Штраф!'
                break
        }

        $(".logs tr:first").before(`<tr><td>${log}</td></tr>`)

        $.ajax({
            url: "/store_log",
            method: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "log": log
            }
        })
    }
}

window.runTraficSignal = runTraficSignal;
window.startTrafficSignal = startTrafficSignal;