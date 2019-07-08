namespace App\Model\Validation;
use Cake\Validation\Validation;
 
class CustomValidation extends Validation {
  //独自のルール
  public static function postal_codeCustom($check) {
    return (bool)  preg_match('/^([0-9]{3})(-[0-9]{4})?$/i', $check);
  }
}
