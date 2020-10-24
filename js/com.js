var food = ['Chhole Bhatur', 'Bharwa Bhindi', 'Pindi Chana', 'Masala Chai', 'Samosa', 'Kulche',
    'Panipuri/Golgappe/Phuchka', 'Jalebi', 'Aloo gobi', 'Aloo tikki', 'Aloo matar', 'Aloo methi', 'Aloo shimla mirch', 'Amritsari kulcha',
    'Biryani', 'Butter chicken', 'Chana masala', 'Sohan papdi', 'Sukhdi', 'Upmaa', 'Vada pav', 'Ghebar or Ghevar',
    'Maghaz', 'Khakhra', 'Laddu'
];
$(document).ready(function () {
    $('#recipe_finder').autocomplete({
        source: food
    }, {
        autoFocus: true,
        minLength: 2
    });
});