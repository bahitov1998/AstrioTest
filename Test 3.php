<?php  
interface Box{
	public function setData($key,$value);
	public function getData($key);
	public function saveData($save);
	public function loadData($load);
}
abstract class AbstractBox implement Box
{
	protected $data = ["value"];
	public function setData($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function getData($key)
	{
		return $this->data[$key];
	}

	public abstract function save();
	public abstract function load();
}

class FileBox extends AbstractBox
{

	private $file;

	public function create_file($file)
	{
	$this->file = $file;
	}

	public function save($save)
	{
		file_contents($this->file);
	}
	public function load($load)
	{
		$this->data = recover(file_contents($this->file));
	}
}

class DbBox extends AbstractBox
{
	private $dbh;
 
    public function __construct(Dbh $dbh)
    {
        $this->dbh = $dbh;
    }
 
    public function saveDb($value)
    {
        $data = $this->dbh->load();
        $data->set('Maria', $value);
        $this->dbh->save($data);
    }
 
    public function loadDb()
    {
        $data = $this->dbh->load();
        return $data->get('Maria');
    }
}

?>