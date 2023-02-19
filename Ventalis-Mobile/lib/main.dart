import 'package:flutter/material.dart';
import 'package:ventalis_mobile/pages/command_page.dart';
import 'package:ventalis_mobile/pages/conseil_page.dart';
import 'package:ventalis_mobile/pages/home_page.dart';


void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {

  int _currentIndex = 0;

  setCurrentIndex(int index) {
    setState(() {
      _currentIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          leading: Image.asset("assets/images/sheet.png",fit: BoxFit.contain),
          backgroundColor: Color(0xffffffff),
          title: [
            Text("Ventalis"),
            Text("Mon conseillé Ventalis"),
            Text("Mes commandes")
          ][_currentIndex],
          titleTextStyle: TextStyle(
            fontFamily: 'Poppins',
            fontSize: 20,
            color: Color(0xff095b65),
          ),
          ),
        backgroundColor: Color(0xff095b65),
        body: [
          HomePage(),
          ConseilPage(),
          CommandPage()
        ][_currentIndex],
        bottomNavigationBar: BottomNavigationBar(
          currentIndex: _currentIndex,
          onTap: (index) => setCurrentIndex(index),
          selectedItemColor: Color(0xff095b65),
          elevation: 10,
          items: const [
            BottomNavigationBarItem(
                icon: Icon(Icons.home),
                label: 'Accueil'
            ),
            BottomNavigationBarItem(
                icon: Icon(Icons.account_circle_outlined),
                label: 'Conseil'
            ),
            BottomNavigationBarItem(
                icon: Icon(Icons.article_outlined),
                label: 'Commandes'
            ),
          ],
        ),
      ),
    );
  }
}




