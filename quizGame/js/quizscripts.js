var category
var correct_option = {}
var answered = 0
var scores = 0
var state
const fewSeconds = 3


function getAllCategories() {
    //get categories for quiz
    let url = "https://opentdb.com/api_category.php"
    axios.get(url)
        .then((response) => {
            var quiz_obj = response.data
            var dropdown = document.getElementById("dropdown")
            // console.log(quiz_obj)
            for (var i = 0; i < quiz_obj.trivia_categories.length; i++) {
                var item = document.createElement("a");
                item.href = `javascript:getQuiz("${quiz_obj.trivia_categories[i].id}")`;
                item.className = "dropdown-item";
                item.innerText = `${quiz_obj.trivia_categories[i].name}`;
                dropdown.appendChild(item);
            }
            document.getElementById("categories").disabled = false;
        })
        .catch((error) => {
            console.log(error)
        });
}


function getQuiz(id) {
    //get quiz questions
    let url = "https://opentdb.com/api.php?amount=10&category=" + id + "&type=multiple"
    axios.get(url)
        .then((response) => {
            document.getElementById("category").innerHTML =
                `<h1>Selected Category: <br> ${response.data.results[0].category}</h1>`;
            document.getElementById("play").style.display = "inline";
            document.getElementById("question").innerText = "";
            document.getElementById("result").innerText = "";
            document.getElementById('correctanswer').innerHTML = "";
            document.getElementById("totalscore").innerHTML = "";
            correct_answers = {};
            category = id
            state = ""

        })
        .catch((error) => {
            console.log(error)
        });

}


function play() {
    document.querySelector('#play').addEventListener('click', (e) => {
        e.target.disabled = true
      setTimeout(() => {
       e.target.disabled = false
      }, fewSeconds * 1000)
    })
    //reset everything to null for new quiz
    var id = category
    correct_option = {}
    answered = 0
    scores = 0
    document.getElementById('result').innerHTML = ""
    document.getElementById("question").innerHTML = ""
    document.getElementById('correctanswer').innerHTML = ""
    document.getElementById("totalscore").innerHTML = ""
    state = ""
    //get quiz questions
    url = "https://opentdb.com/api.php?amount=10&category=" + id + "&type=multiple"
    axios.get(url)
        .then((response) => {
            let questions_obj = response.data
            let qlist = document.getElementById("question")
            for (let i = 0; i < questions_obj.results.length; i++) {
                let options = questions_obj.results[i].incorrect_answers
                options.push(questions_obj.results[i].correct_answer)
                shuffleArray(options)
                // console.log(options)
                correct_option[questions_obj.results[i].question] = questions_obj.results[i].correct_answer
                // console.log(correct_option)
                // populate trivia cards
                qlist.innerHTML +=`
                <div class='container consx p-3' id='card${i}'>
                    <div class="row">
                        <div class='card-title' id='cardtitle${i}'></div>
                    </div>
                    <div class='row ansrow' id='cardtext${i}'>     
                    </div>
                    <div class="row displayans" id='answer${i}'>
                    </div>
                </div>`;

                document.getElementById(`cardtitle${i}`).innerHTML = questions_obj.results[i].question;
                document.getElementById(`cardtitle${i}`).style.textAlign = "center"
                for (let j = 0; j < options.length; j++) {
                    if (options[j] == questions_obj.results[i].correct_answer) {
                        document.getElementById(`cardtext${i}`).innerHTML +=`
                        <div class="col-12 col-sm-6 ansop">
                            <button onclick="check(this, 'card${i}')" class="btn correctAnswer" id="option_color">${options[j]}</button></div>
                        </div>
                        
                        `;
                    } else {
                        document.getElementById(`cardtext${i}`).innerHTML +=`
                        <div class="col-12 col-sm-6 ansop">
                            <button onclick="check(this, 'card${i}')" class="btn wrongAnswer" id="option_color">${options[j]}</button></div>
                        </div>
                        
                        `;
                    }
                }
            }
            if (answered == 10) {
                document.getElementById('result').innerHTML =
                    `            
            <button class="btn btn-secondary btn-lg p-3 dropdown-toggle btn-warning" type="button" id="categories" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                Categories
            </button>
            `;
            }
        })
        .catch((error) => {
            console.log(error)
        });
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}

function check(ans, cardId) {
    $(`#${cardId}`).find('button').attr('disabled','disabled');
    var class_name = ans.getAttribute('class');
    if (class_name == 'btn correctAnswer') {
        ans.style.backgroundColor = 'green';
        ans.style.border = 'green';
        scores += 1;

    } else {
        ans.style.backgroundColor = 'red';
        ans.style.border = 'red';
    }
    answered += 1;
    if (answered == 10) {
        document.getElementById('result').innerHTML +=
            `
            <button class='btn btn-primary' id='showans' onclick='correctAnswer()'>Show Score and Correct Answers</button>
            `;
    }
}

function correctAnswer() {
    //check scores
    if (scores < 5) {
            state = "Try Harder!"
        } else if (scores < 9) {
            state = "Almost There!"
        } else {
            state = "Well Done!"
        }
        document.getElementById('totalscore').innerHTML = `<h3>You scored ${scores} out of 10! ${state}</h3>`;
    //show correct answers
    // console.log(document.getElementsByClassName("correctAnswer"))
    let correctAnswers = document.getElementsByClassName("correctAnswer")
    for (ans of correctAnswers){
        ans.style.backgroundColor = 'green';
        ans.style.border = 'green';
    }
    
    for (let z = 0; z < 10; z++) {
        document.getElementById(`answer${z}`).innerHTML = "Correct Answer: "+ Object.values(correct_option)[z];
    }
    $("#showans").attr("disabled", "disabled"); 
}  

