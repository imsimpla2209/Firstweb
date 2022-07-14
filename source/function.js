// Open menu shop
const User = document.querySelector('.js-user')
const UserClick = document.querySelector('.js-user-click')
const CloseThing = document.querySelector('.body')
const Closemenu = document.querySelector('.Close-menu')


function openUser() {
    User.classList.add('open')
}

function closeUser() {
    User.classList.remove('open')
    CloseThing.classList.add('Pull_right')
    CloseThing.classList.remove('Pull_left')
}

function close_Menu() {
    User.classList.remove('open')
    CloseThing.classList.add('Pull_right')
    CloseThing.classList.remove('Pull_left')
}

function pullRight() {
    CloseThing.classList.remove('Pull_right')
    CloseThing.classList.add('Pull_left')
}
/*---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------*/

//Pull interface

UserClick.addEventListener('click', openUser)
UserClick.addEventListener('click', pullRight)
CloseThing.addEventListener('click', closeUser)
Closemenu.addEventListener('click', close_Menu)
User.addEventListener('click', function(event) {
    event.stopPropagation()
})
UserClick.addEventListener('click', function(event) {
        event.stopPropagation()
    })
    /*---------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------------------------*/

//Dark-light mode
const darkmode = document.querySelector('.js-dark-mode')
const active = document.querySelector('.main-body')
const lightmode = document.querySelector('.js-light-mode')


function Dark_mode() {
    active.classList.remove('Lightmode')
    active.classList.add('Darkmode')
}

function Light_mode() {
    active.classList.remove('Darkmode')
    active.classList.add('Lightmode')
}

darkmode.addEventListener('click', Dark_mode)
lightmode.addEventListener('click', Light_mode)
    /* User.addEventListener('click', function(event) {
        event.stopPropagation()
    })
    UserClick.addEventListener('click', function(event) {
        event.stopPropagation() -->
    }) */

/*---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------*/

//Stiky navbar
window.onscroll = function() {
    Stick_top_nav()
};

const topnav = document.getElementById("nav_top");
const sticktop = topnav.offsetTop;

function Stick_top_nav() {
    if (window.pageYOffset >= sticktop) {
        topnav.classList.add("stickontop")
    } else {
        topnav.classList.remove("stickontop");
    }
}
/*---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------*/

// Inbox button
const Inbox = document.querySelector('.js-open-inbox')
const mainInbox = document.querySelector('.js-open-main-inbox')
const outInbox = document.querySelector('.body')
const inInbox = document.querySelector('.no_Touch')
    //variables for messenger

function ShowInbox() {
    var Message = document.getElementById('inbox')
    if (Message.style.display == "none") {
        Message.style.display = "block"
    } else {
        Message.style.display = "none"
    }
}

function closeInbox() {
    var Message1 = document.getElementById('inbox')
    Message1.style.display = "none"
}

Inbox.addEventListener('click', ShowInbox)
outInbox.addEventListener('click', closeInbox)
Inbox.addEventListener('click', function(event) {
    event.stopPropagation()
})
mainInbox.addEventListener('click', function(event) {
    event.stopPropagation()
})


// function openInbox() {
//     mainInbox.classList.add('open')
// }


// Inbox.addEventListener('click', openInbox)
// })

/*---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------*/

{
    "name": "Spider Man",
    "age": 21,
    "secretIdentity": "Peter Parker",
    "score": 26555,
    "image": "https://www.clipartmax.com/png/middle/242-2428596_spider-man-leap-spider-man.png",
    "powers": [
        "Enhanced speed and agility",
        "Spider-sense",
        "Wall-crawling",
        "Webbing",
        "Healing factor"
    ]
}, {
    "name": "Iron Man",
    "age": 39,
    "secretIdentity": "Tony Stark",
    "score": 68455,
    "image": "https://image.api.playstation.com/vulcan/img/rnd/202010/2716/EN4RmIEX4nyQfWv6Vzi2eQ4g.png",
    "powers": [
        "Repulsing the repulsive",
        "Amazing armor, blazing power",
        "Genius-Level Intellect",
        "Super-Human Healing",
        "Radar Avoidance"
    ]
}, {
    "name": "Black Panther",
    "age": 35,
    "secretIdentity": "T'Challa",
    "score": 35122,
    "image": "https://i.pinimg.com/originals/2b/3d/d7/2b3dd7f4809b91bb0031f5700d0e9cd0.png",
    "powers": [
        "Invisibility",
        "Clairvoyance",
        "Cosmic Awareness",
        "Resistance to Telepathy",
        "Super Durability",
        "Super Speed"
    ]
}