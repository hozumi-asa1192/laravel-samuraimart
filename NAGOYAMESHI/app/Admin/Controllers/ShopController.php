<?php

namespace App\Admin\Controllers;

use App\Models\Shop;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Shop';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shop());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('image', __('Image'))->image();
        $grid->column('description', __('Description'));
        $grid->column('start_price', __('Start price'))->sortable();
        $grid->column('end_price', __('End price'))->sortable();
        $grid->column('opening_hour', __('Opening hour'))->sortable();
        $grid->column('closed_hour', __('Closed hour'))->sortable();
        $grid->column('postal_code', __('Postal code'));
        $grid->column('address', __('Address'));
        $grid->column('phone', __('Phone'));
        $grid->column('regular_holiday', __('Regular holiday'));
        $grid->column('category.name', __('Category Name'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter){
            $filter->like('name','店舗名');
            $filter->like('address','住所');
            $filter->in('category_id', 'カテゴリー')->multipleSelect(Category::all()->pluck('name', 'id'));
            $filter->between('created_at','登録日')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Shop::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('image', __('Image'))->image();
        $show->field('description', __('Description'));
        $show->field('start_price', __('Start price'));
        $show->field('end_price', __('End price'));
        $show->field('opening_hour', __('Opening hour'));
        $show->field('closed_hour', __('Closed hour'));
        $show->field('postal_code', __('Postal code'));
        $show->field('address', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('regular_holiday', __('Regular holiday'));
        $show->field('category.name', __('Category Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Shop());

        $form->text('name', __('Name'));
        $form->image('image', __('Image'));
        $form->textarea('description', __('Description'));
        $form->number('start_price', __('Start price'));
        $form->number('end_price', __('End price'));
        $form->time('opening_hour', __('Opening hour'));
        $form->time('closed_hour', __('Closed hour'));
        $form->text('postal_code', __('Postal code'));
        $form->textarea('address', __('Address'));
        $form->mobile('phone', __('Phone'));
        $form->text('regular_holiday', __('Regular holiday'));
        $form->select('category_id', __('Category Name'))->options(Category::all()->pluck('name','id'));

        return $form;
    }
}
