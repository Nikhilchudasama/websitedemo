<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Portfolio extends Model
{
      use SoftDeletes;

      protected $dates = ['deleted_at'];

      protected $fillable = [
          'name', 'designation', 'image', 'status'
      ];

      public static function validationRules($portfolioId = null)
      {
          $uniqueRule = Rule::unique('portfolio');
          if ($portfolioId) {
              $uniqueRule->ignore($portfolioId);
          }

          return [
              'name' => 'required|string',
              'designation' => 'required|string',
              'status' => 'sometimes|boolean'
          ];
      }

      public function getStatus()
      {
          return $this->status ? 'Active' : 'Inactive';
      }
}
