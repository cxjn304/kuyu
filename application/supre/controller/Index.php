<?php
namespace app\supre\controller;
use think\Request;
use think\Controller;
use think\Validate;
use think\Db;

//供应商入驻信息注册页面
class Index extends Controller
{
    //引入视图模版
    public function index()
    {
        return  $this->fetch();
    }

    //提交信息验证
    public function supvali(Request $request)
    {

    $legalfile = request()->file("sup_legal_img");
    $licefile = request()->file("sup_lice_img");
    //$info1 = $legalfile->move(ROOT_PATH . 'public' . DS . 'uploads/legal');
    //$info2 = $licefile->move(ROOT_PATH . 'public' . DS . 'uploads/lice');
//if(!empty($ligalfile) && !empty($licefile)){
// dump($legalfile);
// dump($licefile);
    $info1 = $legalfile->validate(['size'=>2097152,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads/legal');
    $info2 = $licefile->validate(['size'=>2097152,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads/lice');
    if($info1){
            // 成功上传后 获取上传信息
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $legalimg = $info1->getSaveName();
        }else{
            // 上传失败获取错误信息
            echo $legalfile->getError();
            die;
        }

    if($info2){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $liceimg = $info2->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $licefile->getError();
               die;
            }
//}else {return '上传文件不能为空';die;}

    $rule = [
    'sup_name'=>'require|chs',                      //供应商名称为必须
    'sup_cont'=>'require|chs',                      //负责人必须
    'sup_phone'=>'require|length:11|number',                  //负责人电话
    'sup_addr'=>'require|chs',                      //地址
    'sup_legal'=>'require|chs',                     //法人姓名
    'sup_legal_sn'=>'require|length:18|number',     //法人身份证号
    //'sup_legal_img' =>'require|file|image|filesize:2097152', //法人身份证电子版
    'sup_lice_sn'=>'require',                       //营业执照注册号
    //'sup_lice_img' =>'require|file|image|filesize:2097152',  //营业执照电子版
    'sup_lice_addr'=>'require|chs',                 //营业执照所在地
    'sup_add_date'=>'require|date',                 //成立日期
    'sup_term_start'=>'require|date',               //营业期限(开始)
    'sup_term_end'=>'require|date',                 //营业期限(结束)
    'sup_cap'=>'require|number',                    //注册资本(万元)
    'sup_scope'=>'require|chs',                     //经营范围
    'sup_comp_loca'=>'require|chs',                 //公司所在地
    'sup_comp_addr'=>'require|chs',                 //公司详细地址
    'sup_comp_phone'=>'require|length:11|number',             //公司电话
    'sup_sos_name'=>'require|chs',                  //紧急联系人
    'sup_sos_phone'=>'require|length:11|number',               //紧急联系电话

];

    $msg = [
        'sup_name.require' => '供应商名称必须',
        'sup_name.chs' => '请填写正确的供应商名称',
        'sup_cont.require'     => '负责人名称必须',
        'sup_cont.chs'     => '请填写正确的负责人名称',
        'sup_phone.require'   => '请填写负责人电话',
        'sup_phone.length'  => '请填写正确的电话号码',
        'sup_phone.number'  => '请填写正确的电话号码',
        'sup_addr.require'        => '地址必须',
        'sup_addr.chs'  =>  '请填写正确的地址（必须为汉字）',
        //'sup_legal'=>'require|chs',
        'sup_legal.require' =>  '法人姓名必须',
        'sup_legal.chs' =>  '请填写正确的姓名(汉字)',
        //'sup_legal_sn'=>'require|length:18|number',
        'sup_legal_sn.require' =>   '法人身份证号必须',
        'sup_legal_sn.length'   =>  '请填写正确的身份证号（18位）',
        'sup_legal_sn.number'   => '请填写正确的身份证号（数字）',
        //'sup_legal_img'=>'require',
        //'sup_legal_img.require' =>  '请上传身份证图片',
        //'sup_legal_img.file'    =>  '请通过正确的地址上传图片',
        //'sup_legal_img.image'   =>  '请上传正确的文件（图片）',
        //'sup_legal_img.filesize'  =>    '图片大小不能超过2M',
        //'sup_lice_sn'=>'require',
        'sup_lice_sn.require'   =>  '营业执照号必须',
        //'sup_lice_img'=>'require',
        //'sup_lice_img.require'  =>  '请上传营业执照图片',
        //'sup_lice_img.file'    =>   '请通过正确的地址上传图片',
        //'sup_lice_img.image'    =>  '请上传正确的文件（图片）',
        //'sup_lice_img.filesize' =>  '图片大小不能超过2M',
        //'sup_lice_addr'=>'require|chs',
        'sup_lice_addr.require' =>  '营业执照所在地必须',
        'sup_lice_addr.chs' =>  '请填写正确的营业执照所在地',
        //'sup_add_date'=>'require|date',
        'sup_add_date.require'  => '成立日期必须',
        'sup_add_date.date'     =>  '请填写正确的成立日期',
        //'sup_term_start'=>'require|date',
        'sup_term_start.require'    =>  '营业期限（开始）必须',
        'sup_term_start.date'   =>  '请填写正确的日期',
        //'sup_term_end'=>'require|date',
        'sup_term_end.require'  =>  '营业期限（结束）必须',
        'sup_term_end.date'     =>  '请填写正确的日期',
        //'sup_cap'=>'require|number'
        'sup_cap.require'   =>  '请填写注册资本',
        'sup_cap.number'    =>  '注册资本必须为数字',
        //'sup_scope'=>'require|chs',
        'sup_scope.require' => '经营范围必须',
        'sup_scope.chs'     =>  '请填写正确的经营范围(汉字)',
        //'sup_comp_loca'=>'require|chs',
        'sup_comp_loca.require' =>  '公司所在地必须',
        'sup_comp_loca.chs'     =>  '请填写正确的公司所在地(汉字)',
        //'sup_comp_addr'=>'require|chs',                 //公司详细地址
        'sup_comp_addr.require' =>  '公司详细地址必须',
        'sup_comp_addr.chs' => '请填写正确的公司详细地址',

        //'sup_comp_phone'=>'require|mobile',             //公司电话
        'sup_comp_phone.require'    =>  '公司电话必须',
        'sup_comp_phone.length'     =>  '请填写正确的电话号码',
        'sup_comp_phone.number'     =>  '请填写正确的电话号码',

        //'sup_sos_name'=>'require|chs',                  //紧急联系人
        'sup_sos_name.require'  =>  '紧急联系人必须',
        'sup_sos_name.chs'  =>  '请填写正确的紧急联系人名称',

        //'sup_sos_phone'=>'require|mobile',               //紧急联系电话
        'sup_sos_phone.require' =>  '紧急联系电话必须',
        'sup_sos_phone.length'  =>  '请填写正确的电话号码',
        'sup_sos_phone.number'  =>  '请填写正确的电话号码',

    ];
        //获取提交数据
        $data = $request->param();
        //验证
        $validate = new Validate($rule,$msg);
        $result   = $validate->check($data);
        if(!$result){
            echo $validate->getError();
            //通过验证
        }else{
            //根据供应商联系人电话获取是否已存在
            $result = DB::query('select `sup_phone` from `table_sup_info` where `sup_phone`=:sup_phone',['sup_phone'=>$data['sup_phone']]);
            //如果存在
            if($result){
                return json('此供应商已存在！');
            //不存在
            }else{
            $row = DB::execute('INSERT INTO `table_sup_info`  (`sup_name`, `sup_cont`, `sup_phone`, `sup_addr`, `sup_legal`, `sup_legal_sn`, `sup_legal_img`, `sup_lice_sn`, `sup_lice_img`, `sup_lice_addr`, `sup_add_date`, `sup_term_start`, `sup_term_end`, `sup_cap`, `sup_scope`, `sup_comp_loca`, `sup_comp_addr`, `sup_comp_phone`, `sup_sos_name`, `sup_sos_phone`) VALUES (:sup_name, :sup_cont, :sup_phone, :sup_addr, :sup_legal, :sup_legal_sn, :sup_legal_img, :sup_lice_sn, :sup_lice_img, :sup_lice_addr, :sup_add_date, :sup_term_start, :sup_term_end, :sup_cap, :sup_scope, :sup_comp_loca, :sup_comp_addr, :sup_comp_phone, :sup_sos_name, :sup_sos_phone)',[
                'sup_name'=>$data['sup_name'], 'sup_cont'=>$data['sup_cont'], 'sup_phone'=>$data['sup_phone'], 'sup_addr'=>$data['sup_addr'],
                'sup_legal'=>$data['sup_legal'],
                'sup_legal_sn'=>$data['sup_legal_sn'], 'sup_legal_img'=>$legalimg,
                'sup_lice_sn'=>$data['sup_lice_sn'], 'sup_lice_img'=>$liceimg,
                'sup_lice_addr'=>$data['sup_lice_addr'], 'sup_add_date'=>$data['sup_add_date'], 'sup_term_start'=>$data['sup_term_start'], 'sup_term_end'=>$data['sup_term_end'], 'sup_cap'=>$data['sup_cap'],
                'sup_scope'=>$data['sup_scope'], 'sup_comp_loca'=>$data['sup_comp_loca'], 'sup_comp_addr'=>$data['sup_comp_addr'], 'sup_comp_phone'=>$data['sup_comp_phone'], 'sup_sos_name'=>$data['sup_sos_name'], 'sup_sos_phone'=>$data['sup_sos_phone']]
            );
            if($row){
                $result = DB::query('select `sup_id` from `table_sup_info` where `sup_phone`=:sup_phone',['sup_phone'=>$data['sup_phone']]);
//var_dump($result);
                $row = DB::execute('INSERT INTO `table_sub_exa`  (`sub_id`, `exa_type`,`admin_id`,`exa_state`) VALUES (:sub_id,:exa_type,:admin_id,:exa_state)',[
                    'sub_id'=>$result[0]['sup_id'],
                    'exa_type'=>'sup',
                    'admin_id'=>100,
                    'exa_state'=>0
                ]);
                if($row){
                    return view('supre@Exastat/index',['state'=>'上传成功等待审核']);
                }else{
                    return view('supre@Exastat/index',['state'=>'上传失败，请重试']);
                }
            }
}



        }
    }


}

 ?>
