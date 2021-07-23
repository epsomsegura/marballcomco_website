<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\PageData as PD;
use App\Models\ClientsData as CD;

class LandingPageController extends Controller
{
    #region Globals
    // Data from table pageData
    private static function pageData(){return PD::first();}
    private static function clientData(){return CD::all();}
    #endregion Globals

    #region LandingPage
    // Return the landing page view and data
    public function landingPage(){
        $data = [
            'PD' => self::pageData()
        ];
        return View('landingPage.index',$data);
    }
    #endregion 

    #region Text and links settings
    // Return the text and links settings page view and data
    public function textSettings(){
        $data = [
            'PD' => self::pageData()
        ];
        return View('landingPage.settings.textsLinks',$data);
    }
    // Save banner data
    public function bannerData(Request $r,$id){
        $PD = PD::find($id);
        DB::BeginTransaction();
        if($r->slogan == ''){
            return response()->json(['code'=>406,'message'=>'El campo Slogan es requerido'],406);
        }
        else{
            $PD->slogan = $r->slogan;
            try{
                $PD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada'],500);
            }
        }
    }
    // Save enterprise identity data
    public function enterpriseIdentityData(Request $r,$id){
        $PD = PD::find($id);
        DB::BeginTransaction();
        if($r->aboutUs == ''){
            return response()->json(['code'=>406,'message'=>'El campo Acerca de es requerido'],406);
        }
        else if($r->mision == ''){
            return response()->json(['code'=>406,'message'=>'El campo Misión es requerido'],406);
        }
        else if($r->vision == ''){
            return response()->json(['code'=>406,'message'=>'El campo Visión es requerido'],406);
        }
        else{
            $PD->aboutUs = $r->aboutUs;
            $PD->mision = $r->mision;
            $PD->vision = $r->vision;
            try{
                $PD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada'],500);
            }
        }
    }
    // Save product info data
    public function productInfoData(Request $r, $id){
        $PD = PD::find($id);
        DB::BeginTransaction();
        if($r->productsTechDesc == ''){
            return response()->json(['code'=>406,'message'=>'El campo Cómputo, video y conmutadores de es requerido'],406);
        }
        else if($r->productsOfficeDesc == ''){
            return response()->json(['code'=>406,'message'=>'El campo Equipo, mobiliario y productos de papelería es requerido'],406);
        }
        else if($r->productsBuildDesc == ''){
            return response()->json(['code'=>406,'message'=>'El campo Materiales para construcción y remodelación es requerido'],406);
        }
        else if($r->productsCleanDesc == ''){
            return response()->json(['code'=>406,'message'=>'El campo Abarrotes y productos de limpieza es requerido'],406);
        }
        else{
            $PD->productsTechDesc = $r->productsTechDesc;
            $PD->productsOfficeDesc = $r->productsOfficeDesc;
            $PD->productsBuildDesc = $r->productsBuildDesc;
            $PD->productsCleanDesc = $r->productsCleanDesc;
            try{
                $PD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada'],500);
            }
        }
    }
    // Save testimonial data
    public function testimonialData(Request $r,$id){
        $PD = PD::find($id);
        DB::BeginTransaction();
        if($r->testimonial == ''){
            return response()->json(['code'=>406,'message'=>'El campo Testimonio es requerido'],406);
        }
        else{
            $PD->testimonial = $r->testimonial;
            try{
                $PD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada'],500);
            }
        }
    }
    // Save contact data
    public function contactData(Request $r, $id){
        $PD = PD::find($id);
        DB::BeginTransaction();
        if($r->address == ''){
            return response()->json(['code'=>406,'message'=>'El campo Domicilio es requerido'],406);
        }
        else{
            $PD->address = $r->address;
            $PD->emailData = $r->emailData;
            $PD->FacebookLink = $r->FacebookLink;
            $PD->TwitterLink = $r->TwitterLink;
            $PD->InstagramLink = $r->InstagramLink;
            $PD->phonoNumber = $r->phonoNumber;
            $PD->whatsappNumber = $r->whatsappNumber;
            $PD->telegramNumber = $r->telegramNumber;

            try{
                $PD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada'],500);
            }
        }
    }
    #endregion Text and links settings

    #region Clients Data
    // Return the clients settings view
    public function clientsSettings(){
        $data = [
            'PD' => self::pageData(),
            'CD' => self::clientData()
        ];

        return View('landingPage.settings.clients',$data);
    }
    // Save a new client info
    public function saveClient(Request $r){
        $CD = new CD;

        if($r->clientName == ''){
            return response()->json(['code'=>406,'message'=>'El campo Nombre del cliente es requerido'],406);
        }
        else if($r->clientLogo == ''){
            return response()->json(['code'=>406,'message'=>'Debe cargar el logotipo del cliente en un formato de imagen'],406);
        }
        else{
            $CD->clientName = $r->clientName;
            $CD->clientLogo = $r->clientLogo;
            DB::BeginTransaction();
            try{
                $CD->save();
                DB::commit();
                return response()->json(['code'=>200,'message'=>'OK'],200);
            }
            catch(\Exception $e){
                DB::rollback();
                return response()->json(['code'=>500,'message'=>'Ocurrió un error al intentar almacenar la información solicitada. '.$e->getMessage()],500);
            }
        }
    }
    #endregion Clients Data

}

