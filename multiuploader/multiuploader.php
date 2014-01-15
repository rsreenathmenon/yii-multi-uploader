<?php
/*
 * @author -\- автор  Alexander Shapovalov <mail@shapovalov.org>
 * 
 * usage -\- использование
<?php  
 
$this->widget('ext.Yiippod.Yiippod', array(
'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8",
'id' => 'yiippodplayer',
'width'=>640,
'height'=>480,
'bgcolor'=>'#000'
));

?>
 */

class multiuploader extends CWidget
{
    
    public $uploadDir;
    public $actionUrl;
	 /** The uppod.swf url -\- Ссылка на .swf файл uppod'а
     * @var string 
     */
    public $swfUrl;
	
	  /** The media file or stream video URL -\- Адрес медиа файла или потока (RTMP, mov, mp4, flv, avi)
     * The media file must be a string -\- Адрес к файлу\потоку должен иметь строковой тип данных
     *
     * @var string
     */
	  public $assetUrl;
	 
    public $video;
    /** Player width -\- Ширина плеера
     * @var integer
     */
    public $width;
    /** Player height. -\- Высота плеера
     * @var integer
     */
    public $height;
	 /** Player background color -\- Цвет заднего фона плеера
     * @var string
     */
	public $bgcolor;
	 /** Player id. -\- Идентификатор ИД плеера
     * @var string
     */
	public $id;
    /** The js scripts to register  -\- Путь до скрипта uppod'a
     * @var array
     */
    private $js = array(
        'uppod.js'
    );

    /** The asset folder after published  -\- Папка со скриптами после публикации
     * @var string
     */
    private $assets;
    /** 
     * Publishing the assets  -\- Публикация скриптов
     **/
    private function publishAssets() 
    {
        $assets = dirname(__FILE__).DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR;
        $this->assets = Yii::app()->getAssetManager()->publish($assets);
    }
    /** 
     * Register the core uppod js lib -\- Регистрация скрипта плеера библиотека js
     *
     */
    private function registerScripts()
    {
        $url = $this->assets;
		$this->assetUrl=$url;
        Yii::app()->clientScript->registerScriptFile($url.'/jquery.uploadfile.js');
		Yii::app()->clientScript->registerCssFile($url.'/uploadfile.css');
		

    }
    /** 
     * Initialize the widget and necessary properties -\- Инициализация виджета и необходимых свойств
     * 
     */
    public function init()
    {
        $this->publishAssets();
        $this->registerScripts();

        /*if(!isset($this->width) or $this->width < 320 or empty($this->width)) $this->width = 320;
		if(!isset($this->height) or $this->height < 240 or empty($this->height)) $this->height = 240;
		if(!isset($this->bgcolor) or empty($this->bgcolor)) $this->bgcolor = '#FFF';
		if(!isset($this->id) or empty($this->id)) $this->id = 'uppodplayer';
        if(!isset($this->swfUrl)) $this->swfUrl = $this->assets."/uppod.swf";*/
    }
    /** 
     * Render uppod player -\- Отображение плеера
     * 
     */
    public function run()
    {
       
        	$this->render('multiuploader');

    }
 
   
}