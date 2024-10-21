<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoAssistant extends Model
{
    //
    protected $table="seo_assisatant";
    
    public $timestamps = false;
    
    public function getAboutMetaTitleArAttribute($value)
    {
        return $value ?: $this->about_meta_title_en;
    }
    
    public function getAboutMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->about_meta_keywords_en;
    }
    
    public function getAboutMetaDescArAttribute($value)
    {
        return $value ?: $this->about_meta_desc_en;
    }
    
    public function getContactMetaTitleArAttribute($value)
    {
        return $value ?: $this->contact_meta_title_en;
    }
    
    public function getContactMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->contact_meta_keywords_en;
    }
    
    public function getContactMetaDescArAttribute($value)
    {
        return $value ?: $this->contact_meta_desc_en;
    }
    
    public function getProjectsMetaTitleArAttribute($value)
    {
        return $value ?: $this->projects_meta_title_en;
    }
    
    public function getProjectsMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->projects_meta_keywords_en;
    }
    
    public function getProjectsMetaDescArAttribute($value)
    {
        return $value ?: $this->projects_meta_desc_en;
    }
    
    public function getServicesMetaTitleArAttribute($value)
    {
        return $value ?: $this->services_meta_title_en;
    }
    
    public function getServicesMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->services_meta_keywords_en;
    }
    
    public function getServicesMetaDescArAttribute($value)
    {
        return $value ?: $this->services_meta_desc_en;
    }
    
    public function getBlogsMetaTitleArAttribute($value)
    {
        return $value ?: $this->blogs_meta_title_en;
    }
    
    public function getBlogsMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->blogs_meta_keywords_en;
    }
    
    public function getBlogsMetaDescArAttribute($value)
    {
        return $value ?: $this->blogs_meta_desc_en;
    }
    
    public function getHelloMetaTitleArAttribute($value)
    {
        return $value ?: $this->hello_meta_title_en;
    }
    
    public function getHelloMetaKeywordsArAttribute($value)
    {
        return $value ?: $this->hello_meta_keywords_en;
    }
}
