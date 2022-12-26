// ======================================================== template strings for speedometer svg  ========================================================
function display(color, numHours){
    console.log("here")
    console.log(color)
    if (color == 'green'){
        document.getElementById("speedometerText").innerText = "You're Good!"
        document.getElementById("totalHours").innerText = `You have <span style='color: green;'>${numHours}</span> hours of tasks for the next 7 days!`       
    }
    else if (color == "red"){
        var extra_hrs = numHours - 44
        document.getElementById("speedometerText").innerText = "You're Stressed!"
        document.getElementById("totalHours").innerHTML = `You have <span style='color: red;'>${numHours}</span> hours of tasks for the next 7 days! <br>Which is <span style='color: red;'>${extra_hrs}</span> more than the recommended <span style='color: green;'>44</span> working hours in Singapore!`

    }
    return
}

