<?php
/**
 * snap-constructor contains snap-on construction elements
 *
 * this table contains the shape and weight of construction elements/pieces
 *
 * @author Anna Khamsamran <akhamsamran1@cnm.edu>
 *
 **/

**/
class snap-constructor implements \JsonSerializable {
	/**
	 * add validate uuid
	 **/

	use ValidateUuid;

	/**
	 * id for this constructor, this is the primary key
	 * this is a unique index
	 * * @var Uuid|string $constructorId
	 **/
	private
	$constructorId;
	/**
	 * shape of the constructor
	 * * @var string $constructorShape
	 **/
	private
	$constructorShape;
	/**
	 * weight of the constructor
	 * * @var int $constructorWeight
	 **/
	private
	$constructorWeight;
	/**
	 * date the blog was submitted
	 **/
	/**
	 * accessor method for constructor id
	 *
	 * @return Uuid value of constructor id (or null if new constructor)
	 **/
	public
	function getConstructorId(): Uuid {
		return ($this->constructorId);
	}

	/**
	 * mutator method for constructor id
	 *
	 * @param  Uuid| string $newConstructorId value of new constructor id
	 * @throws \RangeException if $newConstructorId is not positive
	 * @throws \TypeError if the constructor Id is not a string
	 **/
	public
	function setConstructorId($newConstructorId): void {
		try {
			$uuid = self::validateUuid($newConstructorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the constructor id
		$this->cosntructorId = $uuid;
	}

	/**
	 * accessor method for constructor shape
	 *
	 * @return string value of constructor shape
	 **/
	public
	function getConstructorString(): string {
		return ($this->constructorShape);
	}

	/**
	 * mutator method for constructor shape
	 *
	 * @param string $newConstructorShape new value of constructor shape
	 * @throws \InvalidArgumentException if $newConstructorShape is not a string or insecure
	 * @throws \RangeException if $newConstructorShape is > 32 characters
	 * @throws \TypeError if $newConstructorShape is not a string
	 **/
	public
	function setProfileAtHandle(string $newConstructorShape): void {
		// verify the constructor shape is secure
		$newConstructorShape = trim($newConstructorShape);
		$newConstructorShape = filter_var($newConstructorShape, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newConstructorShape) === true) {
			throw(new \InvalidArgumentException("constructor shape is empty or insecure"));
		}
		// verify the at handle will fit in the database
		if(strlen($newConstructorShape) > 32) {
			throw(new \RangeException("constructor shape is too large"));
		}
		// store the at handle
		$this->constructorShape = $newConstructorShape;
	}
	/**
	 * accessor method for constructor weight
	 *
	 * @return int value of constructor weight
	 **/
	public function getConstructorWeight(): int {
		return ($this->constructorWeight);
	}
	/**
	 * mutator method for constructor weight
	 *
	 * @param string $newConstructorWeight new value of weight of the constructor
	 * @throws \InvalidArgumentException if $newConstructorWeight is not an integer or numeric
	 * @throws \TypeError if $newConstructorWeight is not an integer
	 **/
	public function setConstructorWeight(string $newConstructorWeight) : int {
		// verify the constructor weight is secure
		$newConstructorWeight = trim($newConstructorWeight);
		$newConstructorWeight = is_numeric($newConstructorWeight, FILTER_VALIDATE_INT);
		if(empty($newConstructorWeight) === true) {
			throw(new \InvalidArgumentException("constructor weight is empty or insecure"));
		}
		// store the constructor weight
		$this->constructorWeight = $newConstructorWeight;
	}
}