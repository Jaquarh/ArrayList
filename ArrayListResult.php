final class ArrayListResult
{
	private $result;

	public function __construct( $array )
	{
		if( !is_array( $array ) )
			throw new Exception('Parameter one expects an array datatype.');
		
		$this->result = $array;
	}

	private function isPresent()
	{
		return !empty( $this->result );
	}
	
	public function getFirstOrDefault() {
		return new ArrayList( $this->isPresent() ? $this->result[array_keys($this->result)[0]] : [] );	
	}
	
	public function getResults() {
		return new ArrayList( $this->isPresent() ? $this->result : [] );	
	}
	
}
