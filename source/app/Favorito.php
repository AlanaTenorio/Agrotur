<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
USE Illuminate\Database\Eloquent\Builder;

class Favorito extends Model
{
  protected $primaryKey = ['cliente_id', 'anuncio_id'];
  public $incrementing = false;

  /**
  * Set the keys for a save update query.
  *
  * @param  \Illuminate\Database\Eloquent\Builder  $query
  * @return \Illuminate\Database\Eloquent\Builder
  */
  protected function setKeysForSaveQuery(Builder $query)
  {
      $keys = $this->getKeyName();
      if(!is_array($keys)){
          return parent::setKeysForSaveQuery($query);
      }

      foreach($keys as $keyName){
          $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
      }

      return $query;
  }

  /**
  * Get the primary key value for a save query.
  *
  * @param mixed $keyName
  * @return mixed
  */
  protected function getKeyForSaveQuery($keyName = null)
  {
    if(is_null($keyName)){
        $keyName = $this->getKeyName();
    }

    if (isset($this->original[$keyName])) {
        return $this->original[$keyName];
    }

    return $this->getAttribute($keyName);
  }

  public function cliente(){
    return $this->hasOne('app\Cliente');
  }

  public function anuncio(){
    return $this->hasOne('app\Anuncio');
  }
}
