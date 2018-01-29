#include <iostream>		// cout
#include <cstring>		// strlen, strcpy, strcat, strcmp
#include <algorithm>	// swap

// ****************
// *    String    *
// ****************

class String {
	size_t length;
	char* data;

public:
	// Konstruktorok és destruktor
	String(size_t length = 0) 	: length(length),		data(new char[length+1]) { data[length] = '\0'; }
	String(const char* str)   	: length(strlen(str)), 	data(new char[length+1]) { strcpy(data, str); }
	String(const String& other) : length(other.length), data(new char[length+1]) { strcpy(data, other.data); }
	virtual ~String () { delete[] data; }

	// Copy-and-swap
	void swap(String& other) {
		std::swap(data, other.data);
		std::swap(length, other.length);
	}

	String& operator= (String other) {
		swap(other);
		return *this;
	}

	// Getterek és setterek
	size_t 		 getLength()   const { return length; }
	char*  		 getPointer()  const { return data; }
	const char*  getCPointer() const { return data; }

	// Operátorok
	// Indexelő
	char& operator[](size_t index) { return data[index]; }
	const char& operator[](size_t index) const { return data[index]; }
	
	// Castoló
	operator char*() const { return data; }

	// Összefűző
	String operator+(const String& other) {
		String temp(length + other.length);

		strcpy(temp.data, data);
		strcat(temp.data, other.data);

		return temp;
	}

	// Összehasonlító
	bool operator==(const String& other) { return (strcmp(data, other.data) == 0); }
	bool operator!=(const String& other) { return (strcmp(data, other.data) != 0); }
	bool operator< (const String& other) { return (strcmp(data, other.data) <  0); }
	bool operator> (const String& other) { return (strcmp(data, other.data) >  0); }
	bool operator>=(const String& other) { return (strcmp(data, other.data) >= 0); }
	bool operator<=(const String& other) { return (strcmp(data, other.data) <= 0); }

};

// Inserter operátor
std::ostream& operator<<(std::ostream& os, const String& str) {
	os << str.getCPointer();
	return os;
}

// **********************
// *    Tesztprogram    *
// **********************

int main(int argc, char const *argv[])
{
	// Konstruktorok és operator=
	String s1;
	s1 = "AAA";

	// Indexelés
	String s2(s1);
	s2[0] = 'B';

	// Összefűzés
	String s3 = s1 + s2;

	// Összehasonlítás
	if(s1 < s2) std::cout << "s1 is less than s2\n";

	// Castolás
	char* s = new char[s1.getLength()+1];
	strcpy(s, s1);

	// Kiírás
	std::cout << s1 << '/' << s2 << '/' << s3 << '/' << s << '\n';
	
	delete[] s;
	return 0;
}