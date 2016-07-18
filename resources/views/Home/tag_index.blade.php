@extends('home.common.base')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新标签</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php if($tag_list) foreach($tag_list as $v){?>
                            <span class="label label-grey"><a href="<?php echo url('tag_show','',$v['tag_title']);?>"><?php echo $v['tag_title'];?></a></span><span class="text-muted">X<?php echo $v['topics'];?></span>
                            <?php }?>
                        </ul>
                        <?php if($pagination):?><ul class="pagination"><?php echo $pagination;?></ul><?php endif?>
                    </div>
                </div>
            </div><!-- /.col-md-8 -->

            <div class="col-md-4">
                <?php $this->load->view('common/sidebar_login');?>
                <?php $this->load->view('common/sidebar_ad');?>
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
@stop