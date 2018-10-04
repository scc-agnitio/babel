# Convert iOS file to import (assuming same order/ammount of terms as in original english)

cat -n ios_spanish.txt  | tr '\t' ',' | sed -e '/^$/d' -e 's/\ =\ /,/g' -e 's/;$//g' -e 's/$/,"es"/g'>> terms_translation_es.txt

