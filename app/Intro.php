<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    const GENDER_MALE           = "GENDER_MALE";
    const GENDER_FEMALE         = "GENDER_FEMALE";
    const GENDER_NOT_SPECIFIED  = "GENDER_NS";
    const GENDER_SELF           = "GENDER_SELF";

    const SUBJECT               = "subject";
    const POSSESSIVE            = "possessive";

    public static function getLine() {
        //50% chance of using a pre generated line
        if((rand(1,2)%2)) {
            $line = self::inRandomOrder()->first();
            $line->times_used += 1;
            $line->save();
            return $line->line;
        }
        $seg1 = array();
        $seg2 = array();
        $seg3 = array();
        $seg4 = array();

        $seg1[] = "once upon a time";
        $seg1[] = "it was the year 2807.";
        $seg1[] = "many years ago,";
        $seg1[] = "a long, long time ago,";
        $seg1[] = "it all started that fateful night,";
        $seg1[] = "last night,";

        $seg2[] = "in London, England,";
        $seg2[] = "the earth was a barren wasteland.";
        $seg2[] = "in a dark and lonely alley,";
        $seg2[] = "beneath an old stone bridge,";
        $seg2[] = "on a picturesque, sun-drenched Caribbean island,";
        $seg2[] = "far beneath the streets of Mongolian capitol Ulan Bator,";

        $seg3[] = [self::GENDER_MALE,"Marcus wandered aimlessly."];
        $seg3[] = [self::GENDER_FEMALE,"Elle stood, soaked to the bone and shivering."];
        $seg3[] = [self::GENDER_MALE,"Landon scratched his nose, wondering what was taking so long."];
        $seg3[] = [self::GENDER_FEMALE,"Audry tightened the straps on her helmet, and slipped on a pair on fingerless gloves."];
        $seg3[] = [self::GENDER_SELF,"I slowly slid my knife from its sheath, hoping no one would notice the suspicious movement under my coat."];
        $seg3[] = [self::GENDER_SELF,"I squinted, surveying my surroundings, my eyes stinging from the bright light."];

        $seg4[] = "Then something happened that [subject] did not expect...";
        $seg4[] = "\"Hey you!\" came a voice from behind, startling [object],";
        $seg4[] = "Figuring it would be safe, [subject] stepped out in to the open. That was a mistake.";
        $seg4[] = "Little did [subject] know, things were about to change.";
        $seg4[] = "Today is the day, [subject] decided. Today is the day to finally...";
        $seg4[] = "Just then the phone rang. \"We don't have much time,\" a mysterious voice on the other end said \"they are almost here.\"";
        $p3 = $seg3[rand(0,count($seg3)-1)];
        $p4 = str_ireplace(array("[subject]","[object]"),array(self::genderPronoun($p3[0],self::SUBJECT),self::genderPronoun($p3[0],self::POSSESSIVE)),$seg4[rand(0,count($seg4)-1)]);
        return $seg1[rand(0,count($seg1)-1)] . " " . $seg2[rand(0,count($seg2)-1)] . " " . $p3[1] . " " . $p4;
    }

    /**
     * returns a string representing the gender pronoun of the gender
     * provided can be the subject or the possessive version and also
     * determines if the context is second person or third person
     * @param $gender mixed the user name or id
     * @param $type int SUBJECT or POSSESSIVE
     * @return String the pronoun
     **/
    public static function genderPronoun($gender,$type=self::SUBJECT) {
        switch($gender) {
            case self::GENDER_MALE:
                return (($type==self::SUBJECT) ? "He":"His");
                break;
            case self::GENDER_FEMALE:
                return (($type==self::SUBJECT) ? "she":"Her");
                break;
            case self::GENDER_SELF:
                return (($type==self::SUBJECT) ? "I":"My");
                break;
            default:
                return (($type==self::SUBJECT) ? "They":"Their");
                break;
        }
    }
}
