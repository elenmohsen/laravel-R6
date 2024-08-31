<h1>Queues</h1>
بيكون مرتبط بالجدول بتاع ال jobs
<br>
بيعمل معالجة للوقت اللى بتستغرقة العملية اثناء التنفيذ وهنا انا محتاج المستخدم يتعامل مع الموقع بشكل اسرع او بشكل صامت مثلا فى حالة تحويل ال reslution of videos <br>
اكيد اللى هيتم قدام المستخدم مش هو الوقت الكبير بتاع المعالجة بيكون وقت قليل اوى وفى نفس الوقت بيتخزن اى عملية بتم على ال server <br>
فى جدول ال jobs<br>
ودى وظيفة ال queues<br>
هى اداة بتساعدك انك تهندل كل العمليات بتاعتك بشكل صامت فى المشروع<br>
migration queue already by default in laravel 11
migration file -> mirgration jobs table<br>
in data base found 2 tables jobs& failed_jobs<br>
php artisan make:job SendmailJob<br>
app->jobs->SendmailJob
 ex: handle-> Mail::to('elen@gmail.com')->send(new SendEmail);<br>
 do use like this use Illuminate\Support\Facades\Mail; &
use App\Mail\SendEmail;<br>
.env QUEUE_CONNECTION=database<br>
php artisan queue:work <br>
web.php:-  use App\Jobs\SendmailJob;<br>
Route::get('send/message', function(){
   $job = (new SendmailJob())->delay(\Carbon\carbon::now()->addSeconds(5));
   dispatch($job);
   return "test send message";
});<br>

carbon class ده كلاس متخصص فى جميع انواع التوقيتات سواء كانت <br>
string or units or time stamp<br>
addseconds time i can controll to it.








