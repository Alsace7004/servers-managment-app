

const emojis = [
    /**Smiley Face Emojis**/
    {
        "emoji":"🙂",
        "meaning":"Slightly smiling face",
        "unicode":"U+1F642"
    },
    {
        "emoji":"😀",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😄",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😁",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😅",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😆",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"🤣",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😂",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"🙃",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😉",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😊",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😇",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"😎",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"🤓",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"🧐",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    {
        "emoji":"🥳",
        "meaning":"Smiling face",
        "unicode":"U+1F600"
    },
    /**Emotional Faces Emojis**/
    {
        "emoji":"🥰",
        "meaning":"Smiling face with hearts",
        "unicode":"U+1F970"
    },
    {
        "emoji":"😍",
        "meaning":"Smiling face with heart eyes",
        "unicode":"U+1F60D"
    },
    {
        "emoji":"🤩",
        "meaning":"Star-struck",
        "unicode":"U+1F60D"
    },
    {
        "emoji":"😘",
        "meaning":"Face blowing kiss",
        "unicode":"U+1F618"
    },
    {
        "emoji":"😗",
        "meaning":"Kissing face",
        "unicode":"U+1F617"
    },
    {
        "emoji":"☺",
        "meaning":"Smiling face",
        "unicode":"U+263A"
    },
    {
        "emoji":"😚",
        "meaning":"Kissing face with closed eyes",
        "unicode":"U+1F61A"
    },
    {
        "emoji":"😙",
        "meaning":"Kissng face with smiling eyes",
        "unicode":"U+1F619"
    },
    /**Faces with Tongue Emojis**/
    {
        "emoji":"😋",
        "meaning":"Yummy face",
        "unicode":"U+1F60B"
    },
    {
        "emoji":"😛",
        "meaning":"Face with tongue",
        "unicode":"U+1F61B"
    },
    {
        "emoji":"😜",
        "meaning":"WInking face with tongue",
        "unicode":"U+1F61C"
    },
    {
        "emoji":"🤪",
        "meaning":"Zany face",
        "unicode":"U+1F92A"
    },
    {
        "emoji":"😝",
        "meaning":"Squinting face with tongue",
        "unicode":"U+1F61D"
    },
    {
        "emoji":"🤑",
        "meaning":"Money face with money tongue",
        "unicode":"U+1F911"
    },
    /**Faces with Hands Emojis**/
    {
        "emoji":"🤗",
        "meaning":"Hugs",
        "unicode":"U+1F917"
    },
    {
        "emoji":"🤭",
        "meaning":"Face with hand in mouth",
        "unicode":"U+1F92D"
    },
    {
        "emoji":"🤫",
        "meaning":"Shushing face",
        "unicode":"U+1F92B"
    },
    {
        "emoji":"🤔",
        "meaning":"Thinking face",
        "unicode":"U+1F914"
    },
    /**Neutral Faces Emojis**/
    {
        "emoji":"😐",
        "meaning":"Neutral face",
        "unicode":"U+1F610"
    },
    {
        "emoji":"🤐",
        "meaning":"Zipped mouth",
        "unicode":"U+1F910"
    },
    {
        "emoji":"🤨",
        "meaning":"Face with raised eyebrow",
        "unicode":"U+1F928"
    },
    {
        "emoji":"😑",
        "meaning":"Expressionless face",
        "unicode":"U+1F611"
    },
    {
        "emoji":"😶",
        "meaning":"Face with no mouth",
        "unicode":"U+1F636"
    },
    {
        "emoji":"😏",
        "meaning":"Smirking face",
        "unicode":"U+1F60F"
    },
    {
        "emoji":"😒",
        "meaning":"Unamused face",
        "unicode":"U+1F612"
    },
    {
        "emoji":"🙄",
        "meaning":"Face with rolling eyes",
        "unicode":"U+1F644"
    },
    {
        "emoji":"😬",
        "meaning":"Grimacing face",
        "unicode":"U+1F62C"
    },
    {
        "emoji":"🤥",
        "meaning":"Lying face",
        "unicode":"U+1F925"
    },
     /**Sleepy Faces Emojis**/
    {
        "emoji":"😪",
        "meaning":"Sleepy face",
        "unicode":"U+1F62A"
    },
    {
        "emoji":"😴",
        "meaning":"Sleeping face",
        "unicode":"U+1F634"
    },
    {
        "emoji":"😌",
        "meaning":"Relieved face",
        "unicode":"U+1F60C"
    },
    {
        "emoji":"😔",
        "meaning":"Pensive face",
        "unicode":"U+1F614"
    },
    {
        "emoji":"🤤",
        "meaning":"Drooling face",
        "unicode":"U+1F924"
    },
    /**Sick Faces Emojis**/
    {
        "emoji":"😷",
        "meaning":"Face with mask",
        "unicode":"U+1F637"
    },
    {
        "emoji":"🤒",
        "meaning":"Face with thermometer",
        "unicode":"U+1F912"
    },
    {
        "emoji":"🤕",
        "meaning":"Face with bandage",
        "unicode":"U+1F915"
    },
    {
        "emoji":"🤢",
        "meaning":"Nauseous face",
        "unicode":"U+1F922"
    },
    {
        "emoji":"🤮",
        "meaning":"Vomiting face",
        "unicode":"U+1F92E"
    },
    {
        "emoji":"🤧",
        "meaning":"Sneezing face",
        "unicode":"U+1F927"
    },
    {
        "emoji":"🥵",
        "meaning":"Hot face",
        "unicode":"U+1F975"
    },
    {
        "emoji":"🥶",
        "meaning":"Cold face",
        "unicode":"U+1F976"
    },
    {
        "emoji":"🥴",
        "meaning":"Woozy face",
        "unicode":"U+1F974"
    },
    {
        "emoji":"🤤",
        "meaning":"Face with crossed-out eyes",
        "unicode":"U+1F635"
    },
    {
        "emoji":"🤯",
        "meaning":"Face with exploding head",
        "unicode":"U+1F92F"
    },
    /**Concerned Faces Emojis**/
    {
        "emoji":"😕",
        "meaning":"Confused face",
        "unicode":"U+1F615"
    },
    {
        "emoji":"😟",
        "meaning":"Worried face",
        "unicode":"U+1F61F"
    },
    {
        "emoji":"🙁",
        "meaning":"Slightly frowning face",
        "unicode":"U+1F641"
    },
    {
        "emoji":"☹",
        "meaning":"Frowning face",
        "unicode":"U+2639"
    },
    {
        "emoji":"😮",
        "meaning":"Face with open mouth",
        "unicode":"U+1F62E"
    },
    {
        "emoji":"😯",
        "meaning":"Hushed face",
        "unicode":"U+1F62F"
    },
    {
        "emoji":"😲",
        "meaning":"Astonished face",
        "unicode":"U+1F632"
    },
    {
        "emoji":"😳",
        "meaning":"Flushed face",
        "unicode":"U+1F633"
    },
    {
        "emoji":"🥺",
        "meaning":"Begging face",
        "unicode":"U+1F97A"
    },
    {
        "emoji":"😦",
        "meaning":"Frowning face with open mouth",
        "unicode":"U+1F626"
    },
    {
        "emoji":"😧",
        "meaning":"Angushed face",
        "unicode":"U+1F627"
    },
    {
        "emoji":"😨",
        "meaning":"Fearful face",
        "unicode":"U+1F628"
    },
    {
        "emoji":"😰",
        "meaning":"Anxious face with sweat",
        "unicode":"U+1F630"
    },
    {
        "emoji":"😥",
        "meaning":"Sad but relieved face",
        "unicode":"U+1F625"
    },
    {
        "emoji":"😢",
        "meaning":"Crying face",
        "unicode":"U+1F622"
    },
    {
        "emoji":"😭",
        "meaning":"Loudly crying face",
        "unicode":"U+1F62D"
    },
    {
        "emoji":"😱",
        "meaning":"Screaming face",
        "unicode":"U+1F631"
    },
    {
        "emoji":"😖",
        "meaning":"Confounded face",
        "unicode":"U+1F616"
    },
    {
        "emoji":"😣",
        "meaning":"Persevering face",
        "unicode":"U+1F623"
    },
    {
        "emoji":"😞",
        "meaning":"Disappointed face",
        "unicode":"U+1F61E"
    },
    {
        "emoji":"😓",
        "meaning":"Downcast face with sweat",
        "unicode":"U+1F613"
    },
    {
        "emoji":"😩",
        "meaning":"Weary face",
        "unicode":"U+1F629"
    },
    {
        "emoji":"😫",
        "meaning":"Tired face",
        "unicode":"U+1F62B"
    },
    {
        "emoji":"🥱",
        "meaning":"Yawning face",
        "unicode":"U+1F971"
    },
    /**Negative Faces Emojis**/
    {
        "emoji":"😤",
        "meaning":"Face with steam",
        "unicode":"U+1F624"
    },
    {
        "emoji":"😡",
        "meaning":"Pouting face",
        "unicode":"U+1F621"
    },
    {
        "emoji":"😠",
        "meaning":"Angry face",
        "unicode":"U+1F620"
    },
    {
        "emoji":"🤬",
        "meaning":"Face with symbols on mouth",
        "unicode":"U+1F92C"
    },
    {
        "emoji":"😈",
        "meaning":"Smiling face with horns",
        "unicode":"U+1F608"
    },
    {
        "emoji":"👿",
        "meaning":"Angry face with horns",
        "unicode":"U+1F47F"
    },
    {
        "emoji":"💀",
        "meaning":"Skull",
        "unicode":"U+1F480"
    },
    {
        "emoji":"☠",
        "meaning":"Skull and cross-bone",
        "unicode":"U+2620"
    },
    /**Costume Faces Emojis**/
    {
        "emoji":"💩",
        "meaning":"Pile of poo",
        "unicode":"U+1F4A9"
    },
    {
        "emoji":"🤡",
        "meaning":"Clown",
        "unicode":"U+1F921"
    },
    {
        "emoji":"👹",
        "meaning":"Ogre",
        "unicode":"U+1F479"
    },
    {
        "emoji":"👺",
        "meaning":"Goblin",
        "unicode":"U+1F47A"
    },
    {
        "emoji":"👻",
        "meaning":"Ghost",
        "unicode":"U+1F47B"
    },
    {
        "emoji":"👽",
        "meaning":"Alien",
        "unicode":"U+1F47D"
    },
    {
        "emoji":"👾",
        "meaning":"Alien monster",
        "unicode":"U+1F47E"
    },
    {
        "emoji":"🤖",
        "meaning":"Robot",
        "unicode":"U+1F916"
    },
    /**Faces that require more than one unicode character**/
    /*{
        "emoji":"😶‍🌫️",
        "meaning":"Face in clouds",
        "unicode":"U+1F636 U+200D U+1F32B U+FE0F"
    },
    {
        "emoji":"😮‍💨",
        "meaning":"Face exhaling",
        "unicode":"U+1F62E U+200D U+1F4A8"
    },
    {
        "emoji":"😵‍💫",
        "meaning":"Face with spiral eyes",
        "unicode":"U+1F635 U+200D U+1F4AB"
    },
    {
        "emoji":"❤️‍🔥",
        "meaning":"Heart on fire",
        "unicode":"U+2764 U+FE0F U+200D U+1F525"
    },
    {
        "emoji":"❤️‍🩹",
        "meaning":"Mending heart",
        "unicode":"U+2764 U+FE0F U+200D U+1FA79"
    }, */
    {
        "emoji":"👁️‍🗨️",
        "meaning":"Eye in speech bubble",
        "unicode":"U+1F441 U+FE0F U+200D U+1F5E8 U+FE0F"
    },
    /* {
        "emoji":"🧔‍♂️",
        "meaning":"Man with beard",
        "unicode":"U+1F9D4 U+200D U+2642 U+FE0F"
    },
    {
        "emoji":"🧔‍♀️",
        "meaning":"Woman with beard",
        "unicode":"U+1F9D4 U+200D U+2640 U+FE0F"
    }, */
    {
        "emoji":"👨‍🦰",
        "meaning":"Man with red hair",
        "unicode":"U+1F468 U+200D U+1F9B0"
    },
    {
        "emoji":"👨‍🦱",
        "meaning":"Man with curly hair",
        "unicode":"U+1F468 U+200D U+1F9B1"
    },
    {
        "emoji":"👨‍🦳",
        "meaning":"Man with white hair",
        "unicode":"U+1F468 U+200D U+1F9B3"
    },
    {
        "emoji":"👨‍🦲",
        "meaning":"Man with bald head",
        "unicode":"U+1F468 U+200D U+1F9B2"
    },
    {
        "emoji":"👩‍🦰",
        "meaning":"Woman with red hair",
        "unicode":"U+1F469 U+200D U+1F9B0"
    },
  /*   {
        "emoji":"🧑‍🦰",
        "meaning":"Person with red hair",
        "unicode":"U+1F9D1 U+200D U+1F9B0"
    }, */
    {
        "emoji":"👩‍🦱",
        "meaning":"Woman with curly hair",
        "unicode":"U+1F469 U+200D U+1F9B1"
    },
   /*  {
        "emoji":"🧑‍🦱",
        "meaning":"Person with curly hair",
        "unicode":"U+1F9D1 U+200D U+1F9B1"
    }, */
    {
        "emoji":"👩‍🦳",
        "meaning":"Woman with white hair",
        "unicode":"U+1F469 U+200D U+1F9B3"
    },
  /*   {
        "emoji":"🧑‍🦳",
        "meaning":"Person with white hair",
        "unicode":"U+1F9D1 U+200D U+1F9B3"
    }, */
    {
        "emoji":"👩‍🦲",
        "meaning":"Woman with bald head",
        "unicode":"U+1F469 U+200D U+1F9B2"
    },
   /*  {
        "emoji":"🧑‍🦲",
        "meaning":"Person with bald head",
        "unicode":"U+1F9D1 U+200D U+1F9B2"
    }, */
    {
        "emoji":"👱‍♀️",
        "meaning":"Woman with blond hair",
        "unicode":"U+1F471 U+200D U+2640 U+FE0F"
    },
    {
        "emoji":"👱‍♂️",
        "meaning":"Man with blond hair",
        "unicode":"U+1F471 U+200D U+2642 U+FE0F"
    },

]

export default emojis;