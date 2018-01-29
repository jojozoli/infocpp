#include <algorithm> // for_each, distance, swap
#include <iostream>	 // cout, size_t

// ****************
// *    Vector    *
// ****************

template<class T>
class Vector {
	size_t size;
	T* array;

public:
	// Kostruktorok és destruktor
	Vector(size_t size = 0, const T& fill = T()) : size(size), array(new T[size]) { std::fill(array, array+size, fill); }
	Vector(const Vector& other) : size(other.size), array(new T[size]) { std::copy(other.array, other.array+other.size, array); }
	template<typename It> Vector(It first, It last) : size(std::distance(first, last)), array(new T[size]) { std::copy(first, last, array); }
	virtual ~Vector() { delete[] array; }

	// Copy-and-swap
	void swap(Vector& other) { std::swap(array, other.array); std::swap(size, other.size); }
	Vector& operator=(Vector other) { swap(other); return *this; }

	// Indexelő operátor
	T& operator[](size_t idx) { return array[idx]; }
	const T& operator[](size_t idx) const { return array[idx]; }
	T& at(size_t idx) { if(idx < size) return array[idx]; else throw std::out_of_range(""); }

	// Getter és setter
	size_t getSize() const { return size; }

	// Iterátor (nem vizsgáló!)
	class iterator {
		T* pointer;
	public:
		iterator(T* ptr) : pointer(ptr) { }
		T& operator*() { return *pointer; }
		iterator operator++() { pointer++; return *this; }
		iterator operator++(int) { iterator i = *this; pointer++; return i; }
		bool operator==(const iterator& rhs) { return pointer == rhs.pointer; }
		bool operator!=(const iterator& rhs) { return pointer != rhs.pointer; }
	};

	iterator begin() { return iterator(array); }
	iterator end() { return iterator(array + size); }
};

// **********************
// *    Tesztprogram    *
// **********************

int main() {
	Vector<double> vec1(10, 3.14);
	vec1[3] = 7.456;

	int arr[] = { 2, -5, 420, 666, -1, 7 };
	Vector<int> vec2(arr, arr+4);

	std::for_each(vec1.begin(), vec1.end(), [](const double& item){
		std::cout << item << ' ';
	});

	std::cout << '\n';
	std::for_each(vec2.begin(), vec2.end(), [](const int& item){
		std::cout << item << ' ';
	});

	std::cout << '\n';
	return 0;
}