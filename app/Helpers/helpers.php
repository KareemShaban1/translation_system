<?php

if (!function_exists('numberToArabicWords')) {
          function numberToArabicWords($number) {
              $ones = [
                  'صفر',
                  'واحد',
                  'اثنان',
                  'ثلاثة',
                  'أربعة',
                  'خمسة',
                  'ستة',
                  'سبعة',
                  'ثمانية',
                  'تسعة'
              ];
      
              $tens = [
                  '', // 0-9 don't need a separate word for tens
                  'عشرة',
                  'عشرون',
                  'ثلاثون',
                  'أربعون',
                  'خمسون',
                  'ستون',
                  'سبعون',
                  'ثمانون',
                  'تسعون'
              ];
      
              $hundreds = [
                  '', // 0-9 don't need a separate word for hundreds
                  'مائة',
                  'مئتان',
                  'ثلاثمائة',
                  'أربعمائة',
                  'خمسمائة',
                  'ستمائة',
                  'سبعمائة',
                  'ثمانمائة',
                  'تسعمائة'
              ];
      
              $thousands = [
                  '', // 0-9 don't need a separate word for thousands
                  'ألف',
                  'ألفان',
                  'ثلاثة آلاف',
                  'أربعة آلاف',
                  'خمسة آلاف',
                  'ستة آلاف',
                  'سبعة آلاف',
                  'ثمانية آلاف',
                  'تسعة آلاف'
              ];
      
              $digits = str_split(strrev($number));
              $arabicWords = [];
      
              for ($i = 0; $i < count($digits); $i++) {
                  $digit = (int)$digits[$i];
                  $placeValue = $i;
      
                  if ($digit === 0) {
                      continue;
                  }
      
                  $word = '';
      
                  if ($placeValue === 0) {
                      $word = $ones[$digit];
                  } elseif ($placeValue === 1) {
                      if ($digit === 1 && isset($digits[$i + 1])) {
                          $word = $tens[1 + (int)$digits[$i + 1]];
                          $i++;
                      } else {
                          $word = $tens[$digit];
                      }
                  } elseif ($placeValue === 2) {
                      $word = $hundreds[$digit];
                  } elseif ($placeValue === 3) {
                      $word = $thousands[$digit];
                  } else {
                      // Handle additional place values if needed
                      // You can add more arrays and logic here
                  }
      
                  $arabicWords[] = $word;
              }
      
              return implode(' و ', array_reverse($arabicWords));
          }
      }
      