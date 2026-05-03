<?php

namespace App\Services;

class SurveyQuestions
{
    public static function all()
    {
        return [

            ['q'=>'How familiar are you with AI tools used for civic engagement?',
             'options'=>['Very familiar','Somewhat familiar','Not very familiar','Not at all familiar']],

            ['q'=>'Have you used AI for civic activities?',
             'options'=>['Yes, frequently','Yes, occasionally','No, but I plan to','No']],

            ['q'=>'How effective is AI in sharing civic information?',
             'options'=>['Very effective','Somewhat effective','Not very effective','Not effective at all']],

            ['q'=>'Can AI make civic engagement more accessible?',
             'options'=>['Strongly agree','Agree','Disagree','Strongly disagree']],

            ['q'=>'Can AI improve government response time?',
             'options'=>['Yes','No']],

            ['q'=>'Can AI summaries help understand policies?',
             'options'=>['Yes','No']],

            ['q'=>'Does AI increase civic participation?',
             'options'=>['Strongly agree','Agree','Disagree','Strongly disagree']],

            ['q'=>'Would you report issues using AI apps?',
             'options'=>['Yes','No']],

            ['q'=>'Can AI help voting decisions?',
             'options'=>['Yes','No']],

            ['q'=>'Should governments use AI proactively?',
             'options'=>['Yes','No']],

            ['q'=>'How much do you trust AI in civic matters?',
             'options'=>['A great deal','Some trust','Little trust','No trust']],

            ['q'=>'Can AI record feedback accurately?',
             'options'=>['Yes','No']],

            ['q'=>'Is AI more neutral than humans?',
             'options'=>['Yes','No']],

            ['q'=>'Can AI help non-native speakers participate?',
             'options'=>['Yes','No']],

            ['q'=>'Privacy concerns using AI?',
             'options'=>['Very concerned','Somewhat','Not very','Not at all']],

            ['q'=>'Does AI exclude non-tech users?',
             'options'=>['Yes','No']],

            ['q'=>'Will AI play major role in civic engagement?',
             'options'=>['Major','Moderate','Minor','None']],

            ['q'=>'Can AI help civic skills?',
             'options'=>['Strongly agree','Agree','Disagree','Strongly disagree']],

            ['q'=>'Is citizen feedback important in AI systems?',
             'options'=>['Very important','Important','Not very important','Not important']],

            ['q'=>'Overall, will AI strengthen civic engagement?',
             'options'=>['Yes','No']],
        ];
    }
}