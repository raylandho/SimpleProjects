let storedCity = localStorage.getItem("city");
//console.log(storedCity); 
for(var i, j = 0; i = (document.getElementById('limit-id').options[j]); j++){
    if(i.value == storedCity){
        //console.log(i.value);
        (document.getElementById('limit-id')).selectedIndex = j;
        break;
    }
}
let cityInput = $("#limit-id").val();
    localStorage.setItem("city", cityInput);
    let limitInput = $("#limit-id").val();
    let convertedSearchInput = encodeURIComponent(limitInput);
    let endpoint = "https://api.weatherbit.io/v2.0/current?city=" + convertedSearchInput;
    console.log(endpoint);
    if(cityInput == "Los Angeles"){
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "Los Angeles, California",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
            document.querySelector("#description").innerHTML = results.data[0].weather.description;
            document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
    else if(cityInput == "New York"){
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "New York, New York",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
                document.querySelector("#description").innerHTML = results.data[0].weather.description;
                document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
    else{
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "Chicago, Illinois",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
                document.querySelector("#description").innerHTML = results.data[0].weather.description;
                document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
//document.querySelector("#form-control").onchange = function(event) {
$(".form-control").on("change",function(event){
    event.preventDefault();
    let cityInput = $("#limit-id").val();
    localStorage.setItem("city", cityInput);
    let limitInput = $("#limit-id").val();
    let convertedSearchInput = encodeURIComponent(limitInput);
    let endpoint = "https://api.weatherbit.io/v2.0/current?city=" + convertedSearchInput;
    console.log(endpoint);
    if(cityInput == "Los Angeles"){
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "Los Angeles, California",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
            document.querySelector("#description").innerHTML = results.data[0].weather.description;
            document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
    else if(cityInput == "New York"){
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "New York, New York",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
                document.querySelector("#description").innerHTML = results.data[0].weather.description;
                document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
    else{
        $.ajax({
            method: "GET",
            url: "https://api.weatherbit.io/v2.0/current?",
            data: {
                key: "73b9eeeec8ae471586541a87db253c4e",
                units: "I",
                city: "Chicago, Illinois",
            }
        })
        .done(function(results) {
            console.log(results);
            document.querySelector("#weather").innerHTML = results.data[0].temp;
            document.querySelector("#description").innerHTML = results.data[0].weather.description;
            document.querySelector("#apparent").innerHTML = results.data[0].app_temp;
        })
        .fail(function(results){
            console.log("ERROR");
            console.log(results);
        });
    }
});
//to remove
$(".clicker").on("click", function(event){
    $(this).parent().addClass("list");
    $(".list").remove();
    $(this).parent().removeClass("list");
});
//to change
$(".clickme").on("click", function(event){
    $(this).addClass("list");

    if($(".list").css("color") == $("#dummy").css("color")){
        $(".list").css({"color":"black","text-decoration":"none"});
    }
    else{
        $(".list").css({"color":"red","text-decoration":"line-through"});
    }
    $(this).removeClass("list");
});
//to add
$("#name-input").on("submit", function(event){
    event.preventDefault();
    let temp = $("#entered").val();
    $("#add-here").append(`<li class="clickme"><button class="clicker">🔲</button> ${temp}</li>`);
});

$(".hider").on("click", function(event){
    if($("#name-input").css("visibility") == "visible"){
        $("#name-input").slideUp("slow");
        $("#name-input").css("visibility", "hidden");
    }
    else{
        $("#name-input").slideDown("slow");
        $("#name-input").css("visibility", "visible");
    }
});