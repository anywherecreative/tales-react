<?php

use Illuminate\Database\Seeder;

class IntroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = [
            [
                "id" => 1,
                "line" => 'Matt was a mostly ordinary kid, living a mostly ordinary life, but he had a dark secret that no one knew about.',
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 2,
                "line" => "Brenton Cabrera sat on the back of his yacht, anchored in the bay, sipping a cocktail and hoping his phone wouldn't ring. The weather was perfect, the sunset magnificent; an excellent evening for not working. He glanced over at his phone on the table beside him, and it didn't ring, but something a little bit worse happened.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 3,
                "line" => "Rosie Stabs was a woman with an unfortunate name. All her life she had dreamed of being an elementary school teacher, but \"Miss Stabs\" just wasn't working in her favor.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 4,
                "line" => "The desert sun glared down, and with nowhere to hide from it, and nothing to drink, Shahid was starting to feel dispair. He slumped down next to a small boulder, relishing the tiny patch of shade next to it, and gazed hopelessly at the endless horizon. Then something appeared that he would not have expected in a thousand years.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 5,
                "line" => "Karen raced out to her cruiser, jumped in, started the engine and floored it. Tires squealing, she raced out of the parking lot and headed for 7th street. She had responded to plenty of emergency calls, but this one was different, this one was personal.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 6,
                "line" => "Helena stood alone in the moonlight, watching the black waters below churn and swirl endlessly. If she took one step forward, they would sweet her body away, and no one would ever learn what had happened. With all the events of the past few days resting on her shoulders, it was tempting... \"Helena!\" somone called in the distance, and, startled back to reality, she turned, stumbled, feet caught in her long flowing dress, and tumbled over the edge of the bridge.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 7,
                "line" => "\"Lisa Greenway,\" the man with the gun drawled, \"I never would have guessed it was <em>you</em> behind all this. Well played indeed.\" Lisa's ankle was in agony, probably sprained, and she was definitely cornered on the roof of the 65-story office building where she spent the majority of her days. \"You know what,\" he continued, \"I think I'll just kill you and get it over with.\" He raised his pistol and pointed it at her chest.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 8,
                "line" => "Lauryn woke suddenly, the sound of shattered glass still clattering to the floor confirmed it had not been a dream. There were heavy footsteps on the other side of the wall, in her little sister's room, but nothing else. <em>What the hell is going on?</em> She carefully slid out of bed and tiptoed toward her door, her hand shaking as she reached for the knob.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 9,
                "line" => "Prince Luben oiled his luxurious mustache and gazed out over the dusty, sun-drenched landscape of fields and villages beneath his palace balcony. He watched the peasants, like ants wandering to and fro carrying grains of sand. Everything he could see from the railing where he set down his bottle of mustache oil to the distant hazy horizon belonged to his father, the auspicious Tsar Dragomir, but soon, that would all change.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 10,
                "line" => "Tamika's heart was kept in a jar, on the top shelf in the cupboard above the stove. Nobody ever looked up there because they weren't tall enough, and every night, after everyone else had gone to bed, she would get a chair from the dining room and climb up and check on it. Tonight was like any other night as she quietly fetched the chair, humming softly to herself. She hoisted herself up an gasped. The jar was gone, and in its place was a note.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 11,
                "line" => "Ernest stared at his watch; the second hand slowly, tediously made its way around the face. What was taking so long? He gazed across the turbulent river of noise and steel that was Second Street, picking absent mindedly at a spot of loose paint on the bus stop bench where he sat. He was anxiously waiting for something, but it wasn't a bus.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ],
            [
                "id" => 12,
                "line" => "I crept cautiously around the edge of the large square, tiled roof surrounding the courtyard. My feet were quiet in supple moccasins, and I kept below the roof line to avoid being spotted against the still-glowing evening sky. Somewhere in that courtyard, my target was revelling in drunken excess, being fed exotic fruit by slaves. He would be an easy kill, but his seventy-two guards might be a problem.",
                "times_used" => 0,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('intros')->insert($lines);
    }
}
