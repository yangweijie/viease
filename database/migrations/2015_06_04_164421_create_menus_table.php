<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 备注防止忘记 :
         *
         * 设计中所有的 media_id 将被替换为事件 
         */

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->comment('所属公众号');     
            $table->integer('parent_id')->nullable()->default(0)->comment('菜单父id');
            $table->string('name', 30)->comment('菜单名称');       
            $table->enum('type', [
                    'click',
                    'view',
                    'scancode_push',
                    'scancode_waitmsg',
                    'pic_sysphoto',
                    'pic_photo_or_album',
                    'pic_weixin',
                    'location_select',
                ])->default('click')->comment('菜单类型');     
            $table->string('key', 200)->nullable()->comment('菜单触发值');     
            $table->tinyInteger('sort')->nullable()->default(0)->comment('排序'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
