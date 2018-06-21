<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Base extends Authenticatable
{
    /**
     * Set $guarded to empty array to avoid mass assignment errors.
     * This is safe to do if we ALWAYS explicitly specify which database fields will be updated.
     *
     * Do this ...
     *
     * User::create(['fname' => $request->fname, 'lname' => $request->lname]);
     *
     * Or this ...
     *
     * $user = User::find(1);
     * $user->fname = $request->fname;
     * $user->lname = $request->lname;
     * $user->save();
     *
     * But DON'T EVER do this ...
     *
     * User::create($request->all());
     *
     * Or this ...
     *
     * User::find(1)->update($request->all());
     *
     * @link https://laracasts.com/discuss/channels/eloquent/do-i-really-need-to-use-protected-fillable-if
     * @var  array
     *
     */
    protected $guarded = [];
}
